<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/monitoring/v3/alert_service.proto

namespace GPBMetadata\Google\Monitoring\V3;

class AlertService
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();

        if (static::$is_initialized == true) {
          return;
        }
        \GPBMetadata\Google\Api\Annotations::initOnce();
        \GPBMetadata\Google\Api\Client::initOnce();
        \GPBMetadata\Google\Api\FieldBehavior::initOnce();
        \GPBMetadata\Google\Api\Resource::initOnce();
        \GPBMetadata\Google\Monitoring\V3\Alert::initOnce();
        \GPBMetadata\Google\Protobuf\GPBEmpty::initOnce();
        \GPBMetadata\Google\Protobuf\FieldMask::initOnce();
        $pool->internalAddGeneratedFile(
            '
�
(google/monitoring/v3/alert_service.protogoogle.monitoring.v3google/api/client.protogoogle/api/field_behavior.protogoogle/api/resource.proto google/monitoring/v3/alert.protogoogle/protobuf/empty.proto google/protobuf/field_mask.proto"�
CreateAlertPolicyRequest;
name (	B-�A�A\'%monitoring.googleapis.com/AlertPolicy<
alert_policy (2!.google.monitoring.v3.AlertPolicyB�A"T
GetAlertPolicyRequest;
name (	B-�A�A\'
%monitoring.googleapis.com/AlertPolicy"�
ListAlertPoliciesRequest;
name (	B-�A�A\'%monitoring.googleapis.com/AlertPolicy
filter (	
order_by (	
	page_size (

page_token (	"o
ListAlertPoliciesResponse9
alert_policies (2!.google.monitoring.v3.AlertPolicy
next_page_token (	"�
UpdateAlertPolicyRequest/
update_mask (2.google.protobuf.FieldMask<
alert_policy (2!.google.monitoring.v3.AlertPolicyB�A"W
DeleteAlertPolicyRequest;
name (	B-�A�A\'
%monitoring.googleapis.com/AlertPolicy2�
AlertPolicyService�
ListAlertPolicies..google.monitoring.v3.ListAlertPoliciesRequest/.google.monitoring.v3.ListAlertPoliciesResponse"2���%#/v3/{name=projects/*}/alertPolicies�Aname�
GetAlertPolicy+.google.monitoring.v3.GetAlertPolicyRequest!.google.monitoring.v3.AlertPolicy"4���\'%/v3/{name=projects/*/alertPolicies/*}�Aname�
CreateAlertPolicy..google.monitoring.v3.CreateAlertPolicyRequest!.google.monitoring.v3.AlertPolicy"M���3"#/v3/{name=projects/*}/alertPolicies:alert_policy�Aname,alert_policy�
DeleteAlertPolicy..google.monitoring.v3.DeleteAlertPolicyRequest.google.protobuf.Empty"4���\'*%/v3/{name=projects/*/alertPolicies/*}�Aname�
UpdateAlertPolicy..google.monitoring.v3.UpdateAlertPolicyRequest!.google.monitoring.v3.AlertPolicy"c���B22/v3/{alert_policy.name=projects/*/alertPolicies/*}:alert_policy�Aupdate_mask,alert_policy��Amonitoring.googleapis.com�A�https://www.googleapis.com/auth/cloud-platform,https://www.googleapis.com/auth/monitoring,https://www.googleapis.com/auth/monitoring.readB�
com.google.monitoring.v3BAlertServiceProtoPZ>google.golang.org/genproto/googleapis/monitoring/v3;monitoring�Google.Cloud.Monitoring.V3�Google\\Cloud\\Monitoring\\V3�Google::Cloud::Monitoring::V3bproto3'
        , true);

        static::$is_initialized = true;
    }
}

