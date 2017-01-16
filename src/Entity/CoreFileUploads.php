<?php

namespace Adteam\Core\Credits\Adjustment\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CoreFileUploads
 *
 * @ORM\Table(name="core_file_uploads", indexes={@ORM\Index(name="user_id", columns={"user_id"}), @ORM\Index(name="core_file_uploads_ibfk_2", columns={"reason_id"})})
 * @ORM\Entity(repositoryClass="Adteam\Core\Credits\Adjustment\Repository\CoreFileUploadsRepository")
 */
class CoreFileUploads
{
    /**
     * Enum value from $fileType "adjustments".
     */
    const TYPE_ADJUSTMENTS = 'adjustments';

    /**
     * Enum value from $fileType "corrections".
     */
    const TYPE_CORRECTIONS = 'corrections';
    
    /**
     * Enum value from $fileType "extras".
     */
    const TYPE_EXTRAS = 'extras';
    
    /**
     * Enum value from $fileType "results".
     */
    const TYPE_RESULTS = 'results';
    
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=false)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="file_name", type="string", length=255, nullable=false)
     */
    private $fileName;

    /**
     * @var string
     *
     * @ORM\Column(name="file_type", type="string", nullable=false)
     */
    private $fileType = 'adjustments';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="uploaded_at", type="datetime", nullable=false)
     */
    private $uploadedAt = 'CURRENT_TIMESTAMP';

    /**
     * @var \Adteam\Core\Credits\Adjustment\Entity\OauthUsers
     *
     * @ORM\ManyToOne(targetEntity="Adteam\Core\Credits\Adjustment\Entity\OauthUsers")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * })
     */
    private $user;

    /**
     * @var \Adteam\Core\Credits\Adjustment\Entity\CoreFileUploadReasons
     *
     * @ORM\ManyToOne(targetEntity="Adteam\Core\Credits\Adjustment\Entity\CoreFileUploadReasons")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="reason_id", referencedColumnName="id")
     * })
     */
    private $reason;



    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return CoreFileUploads
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set fileName
     *
     * @param string $fileName
     *
     * @return CoreFileUploads
     */
    public function setFileName($fileName)
    {
        $this->fileName = $fileName;

        return $this;
    }

    /**
     * Get fileName
     *
     * @return string
     */
    public function getFileName()
    {
        return $this->fileName;
    }

    /**
     * Set fileType
     *
     * @param string $fileType
     *
     * @return CoreFileUploads
     */
    public function setFileType($fileType)
    {
        $this->fileType = $fileType;

        return $this;
    }

    /**
     * Get fileType
     *
     * @return string
     */
    public function getFileType()
    {
        return $this->fileType;
    }

    /**
     * Set uploadedAt
     *
     * @param \DateTime $uploadedAt
     *
     * @return CoreFileUploads
     */
    public function setUploadedAt($uploadedAt)
    {
        $this->uploadedAt = $uploadedAt;

        return $this;
    }

    /**
     * Get uploadedAt
     *
     * @return \DateTime
     */
    public function getUploadedAt()
    {
        return $this->uploadedAt;
    }

    /**
     * Set user
     *
     * @param \Adteam\Core\Credits\Adjustment\Entity\OauthUsers $user
     *
     * @return CoreFileUploads
     */
    public function setUser(\Adteam\Core\Credits\Adjustment\Entity\OauthUsers $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Adteam\Core\Credits\Adjustment\Entity\OauthUsers
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set reason
     *
     * @param \Adteam\Core\Credits\Adjustment\Entity\CoreFileUploadReasons $reason
     *
     * @return CoreFileUploads
     */
    public function setReason(\Adteam\Core\Credits\Adjustment\Entity\CoreFileUploadReasons $reason = null)
    {
        $this->reason = $reason;

        return $this;
    }

    /**
     * Get reason
     *
     * @return \Adteam\Core\Credits\Adjustment\Entity\CoreFileUploadReasons
     */
    public function getReason()
    {
        return $this->reason;
    }
}
