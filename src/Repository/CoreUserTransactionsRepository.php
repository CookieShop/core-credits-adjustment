<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Adteam\Core\Credits\Adjustment\Repository;

/**
 * Description of CoreUserTransactionsRepository
 *
 * @author dev
 */
use Doctrine\ORM\EntityRepository;
use Adteam\Core\Credits\Adjustment\Entity\OauthUsers;
use Adteam\Core\Credits\Adjustment\Entity\CoreUserTransactions;
use Doctrine\Common\Inflector\Inflector;

class CoreUserTransactionsRepository extends EntityRepository
{
    
    public $errors= [];
    
    //put your code here
    public function create($key,$data,$fileType,$fileId)
    {
        try{
            $user = $this->getUser($data['username']);
            $data['user_id'] = $user['id'];
            $userId = $this->_em->getReference(OauthUsers::class, $user['id']);
            $reflector = new \ReflectionClass('Adteam\Core\Credits\Adjustment\Entity\CoreUserTransactions');
            $class = $reflector->getConstants();
            $this->validate($data);
            $balance = $this->getBalanceSnapshot($data['user_id']) ?: 0;
            $newTransaction = new CoreUserTransactions();
            $newTransaction->setUser($userId);
            $newTransaction->setAmount($data['amount']);
            $newTransaction->setCorrelationId($fileId); //@todo insert file Id
            $newTransaction->setBalanceSnapshot($balance);
            $newTransaction->setDetails(''); //@todo insert details if requested
            $newTransaction->setType($class[Inflector::singularize($fileType)]);
            $newTransaction->setCreatedAt(new \DateTime());
            $newTransaction->setAppliedAt(new \DateTime(
                    $data['year'].'-'.$data['month']));
            $this->_em->persist($newTransaction);
            $this->_em->flush();            
        } catch (\Exception $ex) {
            $this->errors[]='Fila '.($key).': '.$ex->getMessage().PHP_EOL;
        }
    }
    
    /**
     * 
     * @param type $data
     */
    public function validate($data){
        $this->isNumeric($data);
        $this->hasRegex(
                '/^(19|20)\d\d$/', 
                $data, 'year',
                'Formato año debe ser a 4 digitos');
        $this->hasRegex(
                '/^([1-9]|1[012])$/', 
                $data, 'month',
                'Formato mes debe de 1 digito');        
    } 
    
    /**
     * 
     * @param type $username
     * @return type
     * @throws \InvalidArgumentException
     */
    public function getUser($username)
    {
        try{
            return $this->_em->getRepository(OauthUsers::class)
                ->createQueryBuilder('T')
                ->select('T.id,T.username')
                ->where('T.username LIKE :username')
                ->setParameter('username', $username)
                ->andWhere('T.enabled = :enabled')
                ->setParameter('enabled', 1) 
                ->andWhere('T.deletedAt IS NULL')      
                ->getQuery()
                ->getSingleResult();     
        } catch (\Exception $ex) {
            throw new \InvalidArgumentException(
                    'El usuario '.$username.' no existe o esta deshabilitado');
        }
    }  


    /**
     * verifica especificos campos que sean numericos
     * 
     * @param type $field
     * @param type $value
     * @throws \InvalidArgumentException
     */
    public function isNumeric($data)
    {
        if(!(is_numeric($data['month'])
                &&is_numeric($data['year'])
                &&is_numeric($data['amount']))){
           throw new \InvalidArgumentException(
                'El valor mes, año y puntos se requiere numerico');
        }
    }  
    
    /**
     * 
     * @param type $pattern
     * @param type $data
     * @param type $key
     * @param type $msg
     * @throws \InvalidArgumentException
     */
    public function hasRegex($pattern,$data,$key,$msg)
    {
        if(preg_match($pattern, $data[$key])!==1){
           throw new \InvalidArgumentException($msg); 
        }
    } 
    
    /**
     * Get User Transaction balance
     * 
     * @param integer $userId
     * @return integer
     */
    private function getBalanceSnapshot($userId) 
    {
        return $this->createQueryBuilder('T')
            ->select('SUM(T.amount)')
            ->where('T.user = :user_id')
            ->setParameter('user_id', $userId)
            ->getQuery()
            ->getSingleScalarResult();
    }    
}
