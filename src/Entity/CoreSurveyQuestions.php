<?php

namespace Adteam\Core\Credits\Adjustment\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CoreSurveyQuestions
 *
 * @ORM\Table(name="core_survey_questions", indexes={@ORM\Index(name="core_survey_questions_ibfk_2", columns={"user_id"})})
 * @ORM\Entity
 */
class CoreSurveyQuestions
{
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
     * @ORM\Column(name="question", type="string", length=255, nullable=false)
     */
    private $question;

    /**
     * @var string
     *
     * @ORM\Column(name="answer", type="text", length=65535, nullable=false)
     */
    private $answer;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=false)
     */
    private $createdAt = 'CURRENT_TIMESTAMP';

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
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set question
     *
     * @param string $question
     *
     * @return CoreSurveyQuestions
     */
    public function setQuestion($question)
    {
        $this->question = $question;

        return $this;
    }

    /**
     * Get question
     *
     * @return string
     */
    public function getQuestion()
    {
        return $this->question;
    }

    /**
     * Set answer
     *
     * @param string $answer
     *
     * @return CoreSurveyQuestions
     */
    public function setAnswer($answer)
    {
        $this->answer = $answer;

        return $this;
    }

    /**
     * Get answer
     *
     * @return string
     */
    public function getAnswer()
    {
        return $this->answer;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return CoreSurveyQuestions
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set user
     *
     * @param \Adteam\Core\Credits\Adjustment\Entity\OauthUsers $user
     *
     * @return CoreSurveyQuestions
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
}
