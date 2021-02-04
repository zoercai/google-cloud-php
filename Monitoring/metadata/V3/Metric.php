<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/monitoring/v3/metric.proto

namespace GPBMetadata\Google\Monitoring\V3;

class Metric
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();

        if (static::$is_initialized == true) {
          return;
        }
        \GPBMetadata\Google\Api\Distribution::initOnce();
        \GPBMetadata\Google\Api\Label::initOnce();
        \GPBMetadata\Google\Api\Metric::initOnce();
        \GPBMetadata\Google\Api\MonitoredResource::initOnce();
        \GPBMetadata\Google\Monitoring\V3\Common::initOnce();
        \GPBMetadata\Google\Protobuf\Duration::initOnce();
        $pool->internalAddGeneratedFile(
            '
�
!google/monitoring/v3/metric.protogoogle.monitoring.v3google/api/label.protogoogle/api/metric.proto#google/api/monitored_resource.proto!google/monitoring/v3/common.protogoogle/protobuf/duration.proto"n
Point4
interval (2".google.monitoring.v3.TimeInterval/
value (2 .google.monitoring.v3.TypedValue"�

TimeSeries"
metric (2.google.api.Metric/
resource (2.google.api.MonitoredResource7
metadata (2%.google.api.MonitoredResourceMetadata<
metric_kind (2\'.google.api.MetricDescriptor.MetricKind:

value_type (2&.google.api.MetricDescriptor.ValueType+
points (2.google.monitoring.v3.Point"�
TimeSeriesDescriptor6
label_descriptors (2.google.api.LabelDescriptorU
point_descriptors (2:.google.monitoring.v3.TimeSeriesDescriptor.ValueDescriptor�
ValueDescriptor
key (	:

value_type (2&.google.api.MetricDescriptor.ValueType<
metric_kind (2\'.google.api.MetricDescriptor.MetricKind"�
TimeSeriesData6
label_values (2 .google.monitoring.v3.LabelValueB

point_data (2..google.monitoring.v3.TimeSeriesData.PointDatax
	PointData0
values (2 .google.monitoring.v3.TypedValue9
time_interval (2".google.monitoring.v3.TimeInterval"Z

LabelValue

bool_value (H 
int64_value (H 
string_value (	H B
value"Q

QueryError2
locator (2!.google.monitoring.v3.TextLocator
message (	"�
TextLocator
source (	B
start_position (2*.google.monitoring.v3.TextLocator.Position@
end_position (2*.google.monitoring.v3.TextLocator.Position9
nested_locator (2!.google.monitoring.v3.TextLocator
nesting_reason (	(
Position
line (
column (B�
com.google.monitoring.v3BMetricProtoPZ>google.golang.org/genproto/googleapis/monitoring/v3;monitoring�Google.Cloud.Monitoring.V3�Google\\Cloud\\Monitoring\\V3�Google::Cloud::Monitoring::V3bproto3'
        , true);

        static::$is_initialized = true;
    }
}

