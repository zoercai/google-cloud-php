<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/dialogflow/v2/answer_record.proto

namespace Google\Cloud\Dialogflow\V2;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Answer records are records to manage answer history and feedbacks for
 * Dialogflow.
 * Currently, answer record includes:
 * - human agent assistant article suggestion
 * - human agent assistant faq article
 * It doesn't include:
 * - `DetectIntent` intent matching
 * - `DetectIntent` knowledge
 * Answer records are not related to the conversation history in the
 * Dialogflow Console. A Record is generated even when the end-user disables
 * conversation history in the console. Records are created when there's a human
 * agent assistant suggestion generated.
 * A typical workflow for customers provide feedback to an answer is:
 * 1. For human agent assistant, customers get suggestion via ListSuggestions
 *    API. Together with the answers,
 *    [AnswerRecord.name][google.cloud.dialogflow.v2.AnswerRecord.name] are
 *    returned to the customers.
 * 2. The customer uses the
 * [AnswerRecord.name][google.cloud.dialogflow.v2.AnswerRecord.name] to call the
 *    [UpdateAnswerRecord][] method to send feedback about a specific answer
 *    that they believe is wrong.
 *
 * Generated from protobuf message <code>google.cloud.dialogflow.v2.AnswerRecord</code>
 */
class AnswerRecord extends \Google\Protobuf\Internal\Message
{
    /**
     * The unique identifier of this answer record.
     * Format: `projects/<Project ID>/locations/<Location
     * ID>/answerRecords/<Answer Record ID>`.
     *
     * Generated from protobuf field <code>string name = 1;</code>
     */
    private $name = '';
    /**
     * Required. The AnswerFeedback for this record. You can set this with
     * [AnswerRecords.UpdateAnswerRecord][google.cloud.dialogflow.v2.AnswerRecords.UpdateAnswerRecord]
     * in order to give us feedback about this answer.
     *
     * Generated from protobuf field <code>.google.cloud.dialogflow.v2.AnswerFeedback answer_feedback = 2 [(.google.api.field_behavior) = REQUIRED];</code>
     */
    private $answer_feedback = null;
    protected $record;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $name
     *           The unique identifier of this answer record.
     *           Format: `projects/<Project ID>/locations/<Location
     *           ID>/answerRecords/<Answer Record ID>`.
     *     @type \Google\Cloud\Dialogflow\V2\AnswerFeedback $answer_feedback
     *           Required. The AnswerFeedback for this record. You can set this with
     *           [AnswerRecords.UpdateAnswerRecord][google.cloud.dialogflow.v2.AnswerRecords.UpdateAnswerRecord]
     *           in order to give us feedback about this answer.
     *     @type \Google\Cloud\Dialogflow\V2\AgentAssistantRecord $agent_assistant_record
     *           Output only. The record for human agent assistant.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Dialogflow\V2\AnswerRecord::initOnce();
        parent::__construct($data);
    }

    /**
     * The unique identifier of this answer record.
     * Format: `projects/<Project ID>/locations/<Location
     * ID>/answerRecords/<Answer Record ID>`.
     *
     * Generated from protobuf field <code>string name = 1;</code>
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * The unique identifier of this answer record.
     * Format: `projects/<Project ID>/locations/<Location
     * ID>/answerRecords/<Answer Record ID>`.
     *
     * Generated from protobuf field <code>string name = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setName($var)
    {
        GPBUtil::checkString($var, True);
        $this->name = $var;

        return $this;
    }

    /**
     * Required. The AnswerFeedback for this record. You can set this with
     * [AnswerRecords.UpdateAnswerRecord][google.cloud.dialogflow.v2.AnswerRecords.UpdateAnswerRecord]
     * in order to give us feedback about this answer.
     *
     * Generated from protobuf field <code>.google.cloud.dialogflow.v2.AnswerFeedback answer_feedback = 2 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return \Google\Cloud\Dialogflow\V2\AnswerFeedback|null
     */
    public function getAnswerFeedback()
    {
        return isset($this->answer_feedback) ? $this->answer_feedback : null;
    }

    public function hasAnswerFeedback()
    {
        return isset($this->answer_feedback);
    }

    public function clearAnswerFeedback()
    {
        unset($this->answer_feedback);
    }

    /**
     * Required. The AnswerFeedback for this record. You can set this with
     * [AnswerRecords.UpdateAnswerRecord][google.cloud.dialogflow.v2.AnswerRecords.UpdateAnswerRecord]
     * in order to give us feedback about this answer.
     *
     * Generated from protobuf field <code>.google.cloud.dialogflow.v2.AnswerFeedback answer_feedback = 2 [(.google.api.field_behavior) = REQUIRED];</code>
     * @param \Google\Cloud\Dialogflow\V2\AnswerFeedback $var
     * @return $this
     */
    public function setAnswerFeedback($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\Dialogflow\V2\AnswerFeedback::class);
        $this->answer_feedback = $var;

        return $this;
    }

    /**
     * Output only. The record for human agent assistant.
     *
     * Generated from protobuf field <code>.google.cloud.dialogflow.v2.AgentAssistantRecord agent_assistant_record = 4 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return \Google\Cloud\Dialogflow\V2\AgentAssistantRecord|null
     */
    public function getAgentAssistantRecord()
    {
        return $this->readOneof(4);
    }

    public function hasAgentAssistantRecord()
    {
        return $this->hasOneof(4);
    }

    /**
     * Output only. The record for human agent assistant.
     *
     * Generated from protobuf field <code>.google.cloud.dialogflow.v2.AgentAssistantRecord agent_assistant_record = 4 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param \Google\Cloud\Dialogflow\V2\AgentAssistantRecord $var
     * @return $this
     */
    public function setAgentAssistantRecord($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\Dialogflow\V2\AgentAssistantRecord::class);
        $this->writeOneof(4, $var);

        return $this;
    }

    /**
     * @return string
     */
    public function getRecord()
    {
        return $this->whichOneof("record");
    }

}

