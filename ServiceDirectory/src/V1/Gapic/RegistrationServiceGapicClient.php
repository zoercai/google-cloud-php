<?php
/*
 * Copyright 2021 Google LLC
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     https://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

/*
 * GENERATED CODE WARNING
 * This file was generated from the file
 * https://github.com/google/googleapis/blob/master/google/cloud/servicedirectory/v1/registration_service.proto
 * and updates to that file get reflected here through a refresh process.
 *
 * @experimental
 */

namespace Google\Cloud\ServiceDirectory\V1\Gapic;

use Google\ApiCore\ApiException;
use Google\ApiCore\CredentialsWrapper;
use Google\ApiCore\GapicClientTrait;
use Google\ApiCore\PathTemplate;
use Google\ApiCore\RequestParamsHeaderDescriptor;
use Google\ApiCore\RetrySettings;
use Google\ApiCore\Transport\TransportInterface;
use Google\ApiCore\ValidationException;
use Google\Auth\FetchAuthTokenInterface;
use Google\Cloud\Iam\V1\GetIamPolicyRequest;
use Google\Cloud\Iam\V1\GetPolicyOptions;
use Google\Cloud\Iam\V1\Policy;
use Google\Cloud\Iam\V1\SetIamPolicyRequest;
use Google\Cloud\Iam\V1\TestIamPermissionsRequest;
use Google\Cloud\Iam\V1\TestIamPermissionsResponse;
use Google\Cloud\ServiceDirectory\V1\CreateEndpointRequest;
use Google\Cloud\ServiceDirectory\V1\CreateNamespaceRequest;
use Google\Cloud\ServiceDirectory\V1\CreateServiceRequest;
use Google\Cloud\ServiceDirectory\V1\DeleteEndpointRequest;
use Google\Cloud\ServiceDirectory\V1\DeleteNamespaceRequest;
use Google\Cloud\ServiceDirectory\V1\DeleteServiceRequest;
use Google\Cloud\ServiceDirectory\V1\Endpoint;
use Google\Cloud\ServiceDirectory\V1\GetEndpointRequest;
use Google\Cloud\ServiceDirectory\V1\GetNamespaceRequest;
use Google\Cloud\ServiceDirectory\V1\GetServiceRequest;
use Google\Cloud\ServiceDirectory\V1\ListEndpointsRequest;
use Google\Cloud\ServiceDirectory\V1\ListEndpointsResponse;
use Google\Cloud\ServiceDirectory\V1\ListNamespacesRequest;
use Google\Cloud\ServiceDirectory\V1\ListNamespacesResponse;
use Google\Cloud\ServiceDirectory\V1\ListServicesRequest;
use Google\Cloud\ServiceDirectory\V1\ListServicesResponse;
use Google\Cloud\ServiceDirectory\V1\PBNamespace;
use Google\Cloud\ServiceDirectory\V1\Service;
use Google\Cloud\ServiceDirectory\V1\UpdateEndpointRequest;
use Google\Cloud\ServiceDirectory\V1\UpdateNamespaceRequest;
use Google\Cloud\ServiceDirectory\V1\UpdateServiceRequest;
use Google\Protobuf\FieldMask;
use Google\Protobuf\GPBEmpty;

/**
 * Service Description: Service Directory API for registering services. It defines the following
 * resource model:.
 *
 * - The API has a collection of
 * [Namespace][google.cloud.servicedirectory.v1.Namespace]
 * resources, named `projects/&#42;/locations/&#42;/namespaces/*`.
 *
 * - Each Namespace has a collection of
 * [Service][google.cloud.servicedirectory.v1.Service] resources, named
 * `projects/&#42;/locations/&#42;/namespaces/&#42;/services/*`.
 *
 * - Each Service has a collection of
 * [Endpoint][google.cloud.servicedirectory.v1.Endpoint]
 * resources, named
 * `projects/&#42;/locations/&#42;/namespaces/&#42;/services/&#42;/endpoints/*`.
 *
 * This class provides the ability to make remote calls to the backing service through method
 * calls that map to API methods. Sample code to get started:
 *
 * ```
 * $registrationServiceClient = new RegistrationServiceClient();
 * try {
 *     $formattedParent = $registrationServiceClient->locationName('[PROJECT]', '[LOCATION]');
 *     $namespaceId = '';
 *     $namespace = new PBNamespace();
 *     $response = $registrationServiceClient->createNamespace($formattedParent, $namespaceId, $namespace);
 * } finally {
 *     $registrationServiceClient->close();
 * }
 * ```
 *
 * Many parameters require resource names to be formatted in a particular way. To assist
 * with these names, this class includes a format method for each type of name, and additionally
 * a parseName method to extract the individual identifiers contained within formatted names
 * that are returned by the API.
 *
 * @experimental
 */
class RegistrationServiceGapicClient
{
    use GapicClientTrait;

    /**
     * The name of the service.
     */
    const SERVICE_NAME = 'google.cloud.servicedirectory.v1.RegistrationService';

    /**
     * The default address of the service.
     */
    const SERVICE_ADDRESS = 'servicedirectory.googleapis.com';

    /**
     * The default port of the service.
     */
    const DEFAULT_SERVICE_PORT = 443;

    /**
     * The name of the code generator, to be included in the agent header.
     */
    const CODEGEN_NAME = 'gapic';

    /**
     * The default scopes required by the service.
     */
    public static $serviceScopes = [
        'https://www.googleapis.com/auth/cloud-platform',
    ];
    private static $endpointNameTemplate;
    private static $locationNameTemplate;
    private static $namespaceNameTemplate;
    private static $serviceNameTemplate;
    private static $pathTemplateMap;

    private static function getClientDefaults()
    {
        return [
            'serviceName' => self::SERVICE_NAME,
            'serviceAddress' => self::SERVICE_ADDRESS.':'.self::DEFAULT_SERVICE_PORT,
            'clientConfig' => __DIR__.'/../resources/registration_service_client_config.json',
            'descriptorsConfigPath' => __DIR__.'/../resources/registration_service_descriptor_config.php',
            'gcpApiConfigPath' => __DIR__.'/../resources/registration_service_grpc_config.json',
            'credentialsConfig' => [
                'defaultScopes' => self::$serviceScopes,
            ],
            'transportConfig' => [
                'rest' => [
                    'restClientConfigPath' => __DIR__.'/../resources/registration_service_rest_client_config.php',
                ],
            ],
        ];
    }

    private static function getEndpointNameTemplate()
    {
        if (null == self::$endpointNameTemplate) {
            self::$endpointNameTemplate = new PathTemplate('projects/{project}/locations/{location}/namespaces/{namespace}/services/{service}/endpoints/{endpoint}');
        }

        return self::$endpointNameTemplate;
    }

    private static function getLocationNameTemplate()
    {
        if (null == self::$locationNameTemplate) {
            self::$locationNameTemplate = new PathTemplate('projects/{project}/locations/{location}');
        }

        return self::$locationNameTemplate;
    }

    private static function getNamespaceNameTemplate()
    {
        if (null == self::$namespaceNameTemplate) {
            self::$namespaceNameTemplate = new PathTemplate('projects/{project}/locations/{location}/namespaces/{namespace}');
        }

        return self::$namespaceNameTemplate;
    }

    private static function getServiceNameTemplate()
    {
        if (null == self::$serviceNameTemplate) {
            self::$serviceNameTemplate = new PathTemplate('projects/{project}/locations/{location}/namespaces/{namespace}/services/{service}');
        }

        return self::$serviceNameTemplate;
    }

    private static function getPathTemplateMap()
    {
        if (null == self::$pathTemplateMap) {
            self::$pathTemplateMap = [
                'endpoint' => self::getEndpointNameTemplate(),
                'location' => self::getLocationNameTemplate(),
                'namespace' => self::getNamespaceNameTemplate(),
                'service' => self::getServiceNameTemplate(),
            ];
        }

        return self::$pathTemplateMap;
    }

    /**
     * Formats a string containing the fully-qualified path to represent
     * a endpoint resource.
     *
     * @param string $project
     * @param string $location
     * @param string $namespace
     * @param string $service
     * @param string $endpoint
     *
     * @return string The formatted endpoint resource.
     * @experimental
     */
    public static function endpointName($project, $location, $namespace, $service, $endpoint)
    {
        return self::getEndpointNameTemplate()->render([
            'project' => $project,
            'location' => $location,
            'namespace' => $namespace,
            'service' => $service,
            'endpoint' => $endpoint,
        ]);
    }

    /**
     * Formats a string containing the fully-qualified path to represent
     * a location resource.
     *
     * @param string $project
     * @param string $location
     *
     * @return string The formatted location resource.
     * @experimental
     */
    public static function locationName($project, $location)
    {
        return self::getLocationNameTemplate()->render([
            'project' => $project,
            'location' => $location,
        ]);
    }

    /**
     * Formats a string containing the fully-qualified path to represent
     * a namespace resource.
     *
     * @param string $project
     * @param string $location
     * @param string $namespace
     *
     * @return string The formatted namespace resource.
     * @experimental
     */
    public static function namespaceName($project, $location, $namespace)
    {
        return self::getNamespaceNameTemplate()->render([
            'project' => $project,
            'location' => $location,
            'namespace' => $namespace,
        ]);
    }

    /**
     * Formats a string containing the fully-qualified path to represent
     * a service resource.
     *
     * @param string $project
     * @param string $location
     * @param string $namespace
     * @param string $service
     *
     * @return string The formatted service resource.
     * @experimental
     */
    public static function serviceName($project, $location, $namespace, $service)
    {
        return self::getServiceNameTemplate()->render([
            'project' => $project,
            'location' => $location,
            'namespace' => $namespace,
            'service' => $service,
        ]);
    }

    /**
     * Parses a formatted name string and returns an associative array of the components in the name.
     * The following name formats are supported:
     * Template: Pattern
     * - endpoint: projects/{project}/locations/{location}/namespaces/{namespace}/services/{service}/endpoints/{endpoint}
     * - location: projects/{project}/locations/{location}
     * - namespace: projects/{project}/locations/{location}/namespaces/{namespace}
     * - service: projects/{project}/locations/{location}/namespaces/{namespace}/services/{service}.
     *
     * The optional $template argument can be supplied to specify a particular pattern, and must
     * match one of the templates listed above. If no $template argument is provided, or if the
     * $template argument does not match one of the templates listed, then parseName will check
     * each of the supported templates, and return the first match.
     *
     * @param string $formattedName The formatted name string
     * @param string $template      Optional name of template to match
     *
     * @return array An associative array from name component IDs to component values.
     *
     * @throws ValidationException If $formattedName could not be matched.
     * @experimental
     */
    public static function parseName($formattedName, $template = null)
    {
        $templateMap = self::getPathTemplateMap();

        if ($template) {
            if (!isset($templateMap[$template])) {
                throw new ValidationException("Template name $template does not exist");
            }

            return $templateMap[$template]->match($formattedName);
        }

        foreach ($templateMap as $templateName => $pathTemplate) {
            try {
                return $pathTemplate->match($formattedName);
            } catch (ValidationException $ex) {
                // Swallow the exception to continue trying other path templates
            }
        }
        throw new ValidationException("Input did not match any known format. Input: $formattedName");
    }

    /**
     * Constructor.
     *
     * @param array $options {
     *                       Optional. Options for configuring the service API wrapper.
     *
     *     @type string $serviceAddress
     *           **Deprecated**. This option will be removed in a future major release. Please
     *           utilize the `$apiEndpoint` option instead.
     *     @type string $apiEndpoint
     *           The address of the API remote host. May optionally include the port, formatted
     *           as "<uri>:<port>". Default 'servicedirectory.googleapis.com:443'.
     *     @type string|array|FetchAuthTokenInterface|CredentialsWrapper $credentials
     *           The credentials to be used by the client to authorize API calls. This option
     *           accepts either a path to a credentials file, or a decoded credentials file as a
     *           PHP array.
     *           *Advanced usage*: In addition, this option can also accept a pre-constructed
     *           {@see \Google\Auth\FetchAuthTokenInterface} object or
     *           {@see \Google\ApiCore\CredentialsWrapper} object. Note that when one of these
     *           objects are provided, any settings in $credentialsConfig will be ignored.
     *     @type array $credentialsConfig
     *           Options used to configure credentials, including auth token caching, for the client.
     *           For a full list of supporting configuration options, see
     *           {@see \Google\ApiCore\CredentialsWrapper::build()}.
     *     @type bool $disableRetries
     *           Determines whether or not retries defined by the client configuration should be
     *           disabled. Defaults to `false`.
     *     @type string|array $clientConfig
     *           Client method configuration, including retry settings. This option can be either a
     *           path to a JSON file, or a PHP array containing the decoded JSON data.
     *           By default this settings points to the default client config file, which is provided
     *           in the resources folder.
     *     @type string|TransportInterface $transport
     *           The transport used for executing network requests. May be either the string `rest`
     *           or `grpc`. Defaults to `grpc` if gRPC support is detected on the system.
     *           *Advanced usage*: Additionally, it is possible to pass in an already instantiated
     *           {@see \Google\ApiCore\Transport\TransportInterface} object. Note that when this
     *           object is provided, any settings in $transportConfig, and any `$apiEndpoint`
     *           setting, will be ignored.
     *     @type array $transportConfig
     *           Configuration options that will be used to construct the transport. Options for
     *           each supported transport type should be passed in a key for that transport. For
     *           example:
     *           $transportConfig = [
     *               'grpc' => [...],
     *               'rest' => [...]
     *           ];
     *           See the {@see \Google\ApiCore\Transport\GrpcTransport::build()} and
     *           {@see \Google\ApiCore\Transport\RestTransport::build()} methods for the
     *           supported options.
     * }
     *
     * @throws ValidationException
     * @experimental
     */
    public function __construct(array $options = [])
    {
        $clientOptions = $this->buildClientOptions($options);
        $this->setClientOptions($clientOptions);
    }

    /**
     * Creates a namespace, and returns the new Namespace.
     *
     * Sample code:
     * ```
     * $registrationServiceClient = new RegistrationServiceClient();
     * try {
     *     $formattedParent = $registrationServiceClient->locationName('[PROJECT]', '[LOCATION]');
     *     $namespaceId = '';
     *     $namespace = new PBNamespace();
     *     $response = $registrationServiceClient->createNamespace($formattedParent, $namespaceId, $namespace);
     * } finally {
     *     $registrationServiceClient->close();
     * }
     * ```
     *
     * @param string      $parent       Required. The resource name of the project and location the namespace
     *                                  will be created in.
     * @param string      $namespaceId  Required. The Resource ID must be 1-63 characters long, and comply with
     *                                  <a href="https://www.ietf.org/rfc/rfc1035.txt" target="_blank">RFC1035</a>.
     *                                  Specifically, the name must be 1-63 characters long and match the regular
     *                                  expression `[a-z](https://cloud.google.com?:[-a-z0-9]{0,61}[a-z0-9])?` which means the first
     *                                  character must be a lowercase letter, and all following characters must
     *                                  be a dash, lowercase letter, or digit, except the last character, which
     *                                  cannot be a dash.
     * @param PBNamespace $namespace    Required. A namespace with initial fields set.
     * @param array       $optionalArgs {
     *                                  Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\Cloud\ServiceDirectory\V1\PBNamespace
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function createNamespace($parent, $namespaceId, $namespace, array $optionalArgs = [])
    {
        $request = new CreateNamespaceRequest();
        $request->setParent($parent);
        $request->setNamespaceId($namespaceId);
        $request->setNamespace($namespace);

        $requestParams = new RequestParamsHeaderDescriptor([
          'parent' => $request->getParent(),
        ]);
        $optionalArgs['headers'] = isset($optionalArgs['headers'])
            ? array_merge($requestParams->getHeader(), $optionalArgs['headers'])
            : $requestParams->getHeader();

        return $this->startCall(
            'CreateNamespace',
            PBNamespace::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Lists all namespaces.
     *
     * Sample code:
     * ```
     * $registrationServiceClient = new RegistrationServiceClient();
     * try {
     *     $formattedParent = $registrationServiceClient->locationName('[PROJECT]', '[LOCATION]');
     *     // Iterate over pages of elements
     *     $pagedResponse = $registrationServiceClient->listNamespaces($formattedParent);
     *     foreach ($pagedResponse->iteratePages() as $page) {
     *         foreach ($page as $element) {
     *             // doSomethingWith($element);
     *         }
     *     }
     *
     *
     *     // Alternatively:
     *
     *     // Iterate through all elements
     *     $pagedResponse = $registrationServiceClient->listNamespaces($formattedParent);
     *     foreach ($pagedResponse->iterateAllElements() as $element) {
     *         // doSomethingWith($element);
     *     }
     * } finally {
     *     $registrationServiceClient->close();
     * }
     * ```
     *
     * @param string $parent       Required. The resource name of the project and location whose namespaces
     *                             we'd like to list.
     * @param array  $optionalArgs {
     *                             Optional.
     *
     *     @type int $pageSize
     *          The maximum number of resources contained in the underlying API
     *          response. The API may return fewer values in a page, even if
     *          there are additional values to be retrieved.
     *     @type string $pageToken
     *          A page token is used to specify a page of values to be returned.
     *          If no page token is specified (the default), the first page
     *          of values will be returned. Any page token used here must have
     *          been generated by a previous call to the API.
     *     @type string $filter
     *          Optional. The filter to list result by.
     *
     *          General filter string syntax:
     *          <field> <operator> <value> (<logical connector>)
     *          <field> can be "name", or "labels.<key>" for map field.
     *          <operator> can be "<, >, <=, >=, !=, =, :". Of which ":" means HAS, and
     *          is roughly the same as "=".
     *          <value> must be the same data type as field.
     *          <logical connector> can be "AND, OR, NOT".
     *
     *          Examples of valid filters:
     *          * "labels.owner" returns Namespaces that have a label with the key "owner"
     *            this is the same as "labels:owner".
     *          * "labels.protocol=gRPC" returns Namespaces that have key/value
     *            "protocol=gRPC".
     *          * "name>projects/my-project/locations/us-east/namespaces/namespace-c"
     *            returns Namespaces that have name that is alphabetically later than the
     *            string, so "namespace-e" will be returned but "namespace-a" will not be.
     *          * "labels.owner!=sd AND labels.foo=bar" returns Namespaces that have
     *            "owner" in label key but value is not "sd" AND have key/value foo=bar.
     *          * "doesnotexist.foo=bar" returns an empty list. Note that Namespace doesn't
     *            have a field called "doesnotexist". Since the filter does not match any
     *            Namespaces, it returns no results.
     *     @type string $orderBy
     *          Optional. The order to list result by.
     *
     *          General order by string syntax:
     *          <field> (<asc|desc>) (,)
     *          <field> allows values {"name"}
     *          <asc/desc> ascending or descending order by <field>. If this is left
     *          blank, "asc" is used.
     *          Note that an empty order_by string result in default order, which is order
     *          by name in ascending order.
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\ApiCore\PagedListResponse
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function listNamespaces($parent, array $optionalArgs = [])
    {
        $request = new ListNamespacesRequest();
        $request->setParent($parent);
        if (isset($optionalArgs['pageSize'])) {
            $request->setPageSize($optionalArgs['pageSize']);
        }
        if (isset($optionalArgs['pageToken'])) {
            $request->setPageToken($optionalArgs['pageToken']);
        }
        if (isset($optionalArgs['filter'])) {
            $request->setFilter($optionalArgs['filter']);
        }
        if (isset($optionalArgs['orderBy'])) {
            $request->setOrderBy($optionalArgs['orderBy']);
        }

        $requestParams = new RequestParamsHeaderDescriptor([
          'parent' => $request->getParent(),
        ]);
        $optionalArgs['headers'] = isset($optionalArgs['headers'])
            ? array_merge($requestParams->getHeader(), $optionalArgs['headers'])
            : $requestParams->getHeader();

        return $this->getPagedListResponse(
            'ListNamespaces',
            $optionalArgs,
            ListNamespacesResponse::class,
            $request
        );
    }

    /**
     * Gets a namespace.
     *
     * Sample code:
     * ```
     * $registrationServiceClient = new RegistrationServiceClient();
     * try {
     *     $formattedName = $registrationServiceClient->namespaceName('[PROJECT]', '[LOCATION]', '[NAMESPACE]');
     *     $response = $registrationServiceClient->getNamespace($formattedName);
     * } finally {
     *     $registrationServiceClient->close();
     * }
     * ```
     *
     * @param string $name         Required. The name of the namespace to retrieve.
     * @param array  $optionalArgs {
     *                             Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\Cloud\ServiceDirectory\V1\PBNamespace
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function getNamespace($name, array $optionalArgs = [])
    {
        $request = new GetNamespaceRequest();
        $request->setName($name);

        $requestParams = new RequestParamsHeaderDescriptor([
          'name' => $request->getName(),
        ]);
        $optionalArgs['headers'] = isset($optionalArgs['headers'])
            ? array_merge($requestParams->getHeader(), $optionalArgs['headers'])
            : $requestParams->getHeader();

        return $this->startCall(
            'GetNamespace',
            PBNamespace::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Updates a namespace.
     *
     * Sample code:
     * ```
     * $registrationServiceClient = new RegistrationServiceClient();
     * try {
     *     $namespace = new PBNamespace();
     *     $updateMask = new FieldMask();
     *     $response = $registrationServiceClient->updateNamespace($namespace, $updateMask);
     * } finally {
     *     $registrationServiceClient->close();
     * }
     * ```
     *
     * @param PBNamespace $namespace    Required. The updated namespace.
     * @param FieldMask   $updateMask   Required. List of fields to be updated in this request.
     * @param array       $optionalArgs {
     *                                  Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\Cloud\ServiceDirectory\V1\PBNamespace
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function updateNamespace($namespace, $updateMask, array $optionalArgs = [])
    {
        $request = new UpdateNamespaceRequest();
        $request->setNamespace($namespace);
        $request->setUpdateMask($updateMask);

        $requestParams = new RequestParamsHeaderDescriptor([
          'namespace.name' => $request->getNamespace()->getName(),
        ]);
        $optionalArgs['headers'] = isset($optionalArgs['headers'])
            ? array_merge($requestParams->getHeader(), $optionalArgs['headers'])
            : $requestParams->getHeader();

        return $this->startCall(
            'UpdateNamespace',
            PBNamespace::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Deletes a namespace. This also deletes all services and endpoints in
     * the namespace.
     *
     * Sample code:
     * ```
     * $registrationServiceClient = new RegistrationServiceClient();
     * try {
     *     $formattedName = $registrationServiceClient->namespaceName('[PROJECT]', '[LOCATION]', '[NAMESPACE]');
     *     $registrationServiceClient->deleteNamespace($formattedName);
     * } finally {
     *     $registrationServiceClient->close();
     * }
     * ```
     *
     * @param string $name         Required. The name of the namespace to delete.
     * @param array  $optionalArgs {
     *                             Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function deleteNamespace($name, array $optionalArgs = [])
    {
        $request = new DeleteNamespaceRequest();
        $request->setName($name);

        $requestParams = new RequestParamsHeaderDescriptor([
          'name' => $request->getName(),
        ]);
        $optionalArgs['headers'] = isset($optionalArgs['headers'])
            ? array_merge($requestParams->getHeader(), $optionalArgs['headers'])
            : $requestParams->getHeader();

        return $this->startCall(
            'DeleteNamespace',
            GPBEmpty::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Creates a service, and returns the new Service.
     *
     * Sample code:
     * ```
     * $registrationServiceClient = new RegistrationServiceClient();
     * try {
     *     $formattedParent = $registrationServiceClient->namespaceName('[PROJECT]', '[LOCATION]', '[NAMESPACE]');
     *     $serviceId = '';
     *     $service = new Service();
     *     $response = $registrationServiceClient->createService($formattedParent, $serviceId, $service);
     * } finally {
     *     $registrationServiceClient->close();
     * }
     * ```
     *
     * @param string  $parent       Required. The resource name of the namespace this service will belong to.
     * @param string  $serviceId    Required. The Resource ID must be 1-63 characters long, and comply with
     *                              <a href="https://www.ietf.org/rfc/rfc1035.txt" target="_blank">RFC1035</a>.
     *                              Specifically, the name must be 1-63 characters long and match the regular
     *                              expression `[a-z](https://cloud.google.com?:[-a-z0-9]{0,61}[a-z0-9])?` which means the first
     *                              character must be a lowercase letter, and all following characters must
     *                              be a dash, lowercase letter, or digit, except the last character, which
     *                              cannot be a dash.
     * @param Service $service      Required. A service  with initial fields set.
     * @param array   $optionalArgs {
     *                              Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\Cloud\ServiceDirectory\V1\Service
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function createService($parent, $serviceId, $service, array $optionalArgs = [])
    {
        $request = new CreateServiceRequest();
        $request->setParent($parent);
        $request->setServiceId($serviceId);
        $request->setService($service);

        $requestParams = new RequestParamsHeaderDescriptor([
          'parent' => $request->getParent(),
        ]);
        $optionalArgs['headers'] = isset($optionalArgs['headers'])
            ? array_merge($requestParams->getHeader(), $optionalArgs['headers'])
            : $requestParams->getHeader();

        return $this->startCall(
            'CreateService',
            Service::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Lists all services belonging to a namespace.
     *
     * Sample code:
     * ```
     * $registrationServiceClient = new RegistrationServiceClient();
     * try {
     *     $formattedParent = $registrationServiceClient->namespaceName('[PROJECT]', '[LOCATION]', '[NAMESPACE]');
     *     // Iterate over pages of elements
     *     $pagedResponse = $registrationServiceClient->listServices($formattedParent);
     *     foreach ($pagedResponse->iteratePages() as $page) {
     *         foreach ($page as $element) {
     *             // doSomethingWith($element);
     *         }
     *     }
     *
     *
     *     // Alternatively:
     *
     *     // Iterate through all elements
     *     $pagedResponse = $registrationServiceClient->listServices($formattedParent);
     *     foreach ($pagedResponse->iterateAllElements() as $element) {
     *         // doSomethingWith($element);
     *     }
     * } finally {
     *     $registrationServiceClient->close();
     * }
     * ```
     *
     * @param string $parent       Required. The resource name of the namespace whose services we'd
     *                             like to list.
     * @param array  $optionalArgs {
     *                             Optional.
     *
     *     @type int $pageSize
     *          The maximum number of resources contained in the underlying API
     *          response. The API may return fewer values in a page, even if
     *          there are additional values to be retrieved.
     *     @type string $pageToken
     *          A page token is used to specify a page of values to be returned.
     *          If no page token is specified (the default), the first page
     *          of values will be returned. Any page token used here must have
     *          been generated by a previous call to the API.
     *     @type string $filter
     *          Optional. The filter to list result by.
     *
     *          General filter string syntax:
     *          <field> <operator> <value> (<logical connector>)
     *          <field> can be "name", or "metadata.<key>" for map field.
     *          <operator> can be "<, >, <=, >=, !=, =, :". Of which ":" means HAS, and
     *          is roughly the same as "=".
     *          <value> must be the same data type as field.
     *          <logical connector> can be "AND, OR, NOT".
     *
     *          Examples of valid filters:
     *          * "metadata.owner" returns Services that have a label with the key "owner"
     *            this is the same as "metadata:owner".
     *          * "metadata.protocol=gRPC" returns Services that have key/value
     *            "protocol=gRPC".
     *          * "name>projects/my-project/locations/us-east/namespaces/my-namespace/services/service-c"
     *            returns Services that have name that is alphabetically later than the
     *            string, so "service-e" will be returned but "service-a" will not be.
     *          * "metadata.owner!=sd AND metadata.foo=bar" returns Services that have
     *            "owner" in label key but value is not "sd" AND have key/value foo=bar.
     *          * "doesnotexist.foo=bar" returns an empty list. Note that Service doesn't
     *            have a field called "doesnotexist". Since the filter does not match any
     *            Services, it returns no results.
     *     @type string $orderBy
     *          Optional. The order to list result by.
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\ApiCore\PagedListResponse
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function listServices($parent, array $optionalArgs = [])
    {
        $request = new ListServicesRequest();
        $request->setParent($parent);
        if (isset($optionalArgs['pageSize'])) {
            $request->setPageSize($optionalArgs['pageSize']);
        }
        if (isset($optionalArgs['pageToken'])) {
            $request->setPageToken($optionalArgs['pageToken']);
        }
        if (isset($optionalArgs['filter'])) {
            $request->setFilter($optionalArgs['filter']);
        }
        if (isset($optionalArgs['orderBy'])) {
            $request->setOrderBy($optionalArgs['orderBy']);
        }

        $requestParams = new RequestParamsHeaderDescriptor([
          'parent' => $request->getParent(),
        ]);
        $optionalArgs['headers'] = isset($optionalArgs['headers'])
            ? array_merge($requestParams->getHeader(), $optionalArgs['headers'])
            : $requestParams->getHeader();

        return $this->getPagedListResponse(
            'ListServices',
            $optionalArgs,
            ListServicesResponse::class,
            $request
        );
    }

    /**
     * Gets a service.
     *
     * Sample code:
     * ```
     * $registrationServiceClient = new RegistrationServiceClient();
     * try {
     *     $formattedName = $registrationServiceClient->serviceName('[PROJECT]', '[LOCATION]', '[NAMESPACE]', '[SERVICE]');
     *     $response = $registrationServiceClient->getService($formattedName);
     * } finally {
     *     $registrationServiceClient->close();
     * }
     * ```
     *
     * @param string $name         Required. The name of the service to get.
     * @param array  $optionalArgs {
     *                             Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\Cloud\ServiceDirectory\V1\Service
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function getService($name, array $optionalArgs = [])
    {
        $request = new GetServiceRequest();
        $request->setName($name);

        $requestParams = new RequestParamsHeaderDescriptor([
          'name' => $request->getName(),
        ]);
        $optionalArgs['headers'] = isset($optionalArgs['headers'])
            ? array_merge($requestParams->getHeader(), $optionalArgs['headers'])
            : $requestParams->getHeader();

        return $this->startCall(
            'GetService',
            Service::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Updates a service.
     *
     * Sample code:
     * ```
     * $registrationServiceClient = new RegistrationServiceClient();
     * try {
     *     $service = new Service();
     *     $updateMask = new FieldMask();
     *     $response = $registrationServiceClient->updateService($service, $updateMask);
     * } finally {
     *     $registrationServiceClient->close();
     * }
     * ```
     *
     * @param Service   $service      Required. The updated service.
     * @param FieldMask $updateMask   Required. List of fields to be updated in this request.
     * @param array     $optionalArgs {
     *                                Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\Cloud\ServiceDirectory\V1\Service
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function updateService($service, $updateMask, array $optionalArgs = [])
    {
        $request = new UpdateServiceRequest();
        $request->setService($service);
        $request->setUpdateMask($updateMask);

        $requestParams = new RequestParamsHeaderDescriptor([
          'service.name' => $request->getService()->getName(),
        ]);
        $optionalArgs['headers'] = isset($optionalArgs['headers'])
            ? array_merge($requestParams->getHeader(), $optionalArgs['headers'])
            : $requestParams->getHeader();

        return $this->startCall(
            'UpdateService',
            Service::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Deletes a service. This also deletes all endpoints associated with
     * the service.
     *
     * Sample code:
     * ```
     * $registrationServiceClient = new RegistrationServiceClient();
     * try {
     *     $formattedName = $registrationServiceClient->serviceName('[PROJECT]', '[LOCATION]', '[NAMESPACE]', '[SERVICE]');
     *     $registrationServiceClient->deleteService($formattedName);
     * } finally {
     *     $registrationServiceClient->close();
     * }
     * ```
     *
     * @param string $name         Required. The name of the service to delete.
     * @param array  $optionalArgs {
     *                             Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function deleteService($name, array $optionalArgs = [])
    {
        $request = new DeleteServiceRequest();
        $request->setName($name);

        $requestParams = new RequestParamsHeaderDescriptor([
          'name' => $request->getName(),
        ]);
        $optionalArgs['headers'] = isset($optionalArgs['headers'])
            ? array_merge($requestParams->getHeader(), $optionalArgs['headers'])
            : $requestParams->getHeader();

        return $this->startCall(
            'DeleteService',
            GPBEmpty::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Creates a endpoint, and returns the new Endpoint.
     *
     * Sample code:
     * ```
     * $registrationServiceClient = new RegistrationServiceClient();
     * try {
     *     $formattedParent = $registrationServiceClient->serviceName('[PROJECT]', '[LOCATION]', '[NAMESPACE]', '[SERVICE]');
     *     $endpointId = '';
     *     $endpoint = new Endpoint();
     *     $response = $registrationServiceClient->createEndpoint($formattedParent, $endpointId, $endpoint);
     * } finally {
     *     $registrationServiceClient->close();
     * }
     * ```
     *
     * @param string   $parent       Required. The resource name of the service that this endpoint provides.
     * @param string   $endpointId   Required. The Resource ID must be 1-63 characters long, and comply with
     *                               <a href="https://www.ietf.org/rfc/rfc1035.txt" target="_blank">RFC1035</a>.
     *                               Specifically, the name must be 1-63 characters long and match the regular
     *                               expression `[a-z](https://cloud.google.com?:[-a-z0-9]{0,61}[a-z0-9])?` which means the first
     *                               character must be a lowercase letter, and all following characters must
     *                               be a dash, lowercase letter, or digit, except the last character, which
     *                               cannot be a dash.
     * @param Endpoint $endpoint     Required. A endpoint with initial fields set.
     * @param array    $optionalArgs {
     *                               Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\Cloud\ServiceDirectory\V1\Endpoint
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function createEndpoint($parent, $endpointId, $endpoint, array $optionalArgs = [])
    {
        $request = new CreateEndpointRequest();
        $request->setParent($parent);
        $request->setEndpointId($endpointId);
        $request->setEndpoint($endpoint);

        $requestParams = new RequestParamsHeaderDescriptor([
          'parent' => $request->getParent(),
        ]);
        $optionalArgs['headers'] = isset($optionalArgs['headers'])
            ? array_merge($requestParams->getHeader(), $optionalArgs['headers'])
            : $requestParams->getHeader();

        return $this->startCall(
            'CreateEndpoint',
            Endpoint::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Lists all endpoints.
     *
     * Sample code:
     * ```
     * $registrationServiceClient = new RegistrationServiceClient();
     * try {
     *     $formattedParent = $registrationServiceClient->serviceName('[PROJECT]', '[LOCATION]', '[NAMESPACE]', '[SERVICE]');
     *     // Iterate over pages of elements
     *     $pagedResponse = $registrationServiceClient->listEndpoints($formattedParent);
     *     foreach ($pagedResponse->iteratePages() as $page) {
     *         foreach ($page as $element) {
     *             // doSomethingWith($element);
     *         }
     *     }
     *
     *
     *     // Alternatively:
     *
     *     // Iterate through all elements
     *     $pagedResponse = $registrationServiceClient->listEndpoints($formattedParent);
     *     foreach ($pagedResponse->iterateAllElements() as $element) {
     *         // doSomethingWith($element);
     *     }
     * } finally {
     *     $registrationServiceClient->close();
     * }
     * ```
     *
     * @param string $parent       Required. The resource name of the service whose endpoints we'd like to
     *                             list.
     * @param array  $optionalArgs {
     *                             Optional.
     *
     *     @type int $pageSize
     *          The maximum number of resources contained in the underlying API
     *          response. The API may return fewer values in a page, even if
     *          there are additional values to be retrieved.
     *     @type string $pageToken
     *          A page token is used to specify a page of values to be returned.
     *          If no page token is specified (the default), the first page
     *          of values will be returned. Any page token used here must have
     *          been generated by a previous call to the API.
     *     @type string $filter
     *          Optional. The filter to list result by.
     *
     *          General filter string syntax:
     *          <field> <operator> <value> (<logical connector>)
     *          <field> can be "name", "address", "port" or "metadata.<key>" for map field.
     *          <operator> can be "<, >, <=, >=, !=, =, :". Of which ":" means HAS, and
     *          is roughly the same as "=".
     *          <value> must be the same data type as field.
     *          <logical connector> can be "AND, OR, NOT".
     *
     *          Examples of valid filters:
     *          * "metadata.owner" returns Endpoints that have a label with the key "owner"
     *            this is the same as "metadata:owner".
     *          * "metadata.protocol=gRPC" returns Endpoints that have key/value
     *            "protocol=gRPC".
     *          * "address=192.108.1.105" returns Endpoints that have this address.
     *          * "port>8080" returns Endpoints that have port number larger than 8080.
     *          * "name>projects/my-project/locations/us-east/namespaces/my-namespace/services/my-service/endpoints/endpoint-c"
     *            returns Endpoints that have name that is alphabetically later than the
     *            string, so "endpoint-e" will be returned but "endpoint-a" will not be.
     *          * "metadata.owner!=sd AND metadata.foo=bar" returns Endpoints that have
     *            "owner" in label key but value is not "sd" AND have key/value foo=bar.
     *          * "doesnotexist.foo=bar" returns an empty list. Note that Endpoint doesn't
     *            have a field called "doesnotexist". Since the filter does not match any
     *            Endpoints, it returns no results.
     *     @type string $orderBy
     *          Optional. The order to list result by.
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\ApiCore\PagedListResponse
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function listEndpoints($parent, array $optionalArgs = [])
    {
        $request = new ListEndpointsRequest();
        $request->setParent($parent);
        if (isset($optionalArgs['pageSize'])) {
            $request->setPageSize($optionalArgs['pageSize']);
        }
        if (isset($optionalArgs['pageToken'])) {
            $request->setPageToken($optionalArgs['pageToken']);
        }
        if (isset($optionalArgs['filter'])) {
            $request->setFilter($optionalArgs['filter']);
        }
        if (isset($optionalArgs['orderBy'])) {
            $request->setOrderBy($optionalArgs['orderBy']);
        }

        $requestParams = new RequestParamsHeaderDescriptor([
          'parent' => $request->getParent(),
        ]);
        $optionalArgs['headers'] = isset($optionalArgs['headers'])
            ? array_merge($requestParams->getHeader(), $optionalArgs['headers'])
            : $requestParams->getHeader();

        return $this->getPagedListResponse(
            'ListEndpoints',
            $optionalArgs,
            ListEndpointsResponse::class,
            $request
        );
    }

    /**
     * Gets a endpoint.
     *
     * Sample code:
     * ```
     * $registrationServiceClient = new RegistrationServiceClient();
     * try {
     *     $formattedName = $registrationServiceClient->endpointName('[PROJECT]', '[LOCATION]', '[NAMESPACE]', '[SERVICE]', '[ENDPOINT]');
     *     $response = $registrationServiceClient->getEndpoint($formattedName);
     * } finally {
     *     $registrationServiceClient->close();
     * }
     * ```
     *
     * @param string $name         Required. The name of the endpoint to get.
     * @param array  $optionalArgs {
     *                             Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\Cloud\ServiceDirectory\V1\Endpoint
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function getEndpoint($name, array $optionalArgs = [])
    {
        $request = new GetEndpointRequest();
        $request->setName($name);

        $requestParams = new RequestParamsHeaderDescriptor([
          'name' => $request->getName(),
        ]);
        $optionalArgs['headers'] = isset($optionalArgs['headers'])
            ? array_merge($requestParams->getHeader(), $optionalArgs['headers'])
            : $requestParams->getHeader();

        return $this->startCall(
            'GetEndpoint',
            Endpoint::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Updates a endpoint.
     *
     * Sample code:
     * ```
     * $registrationServiceClient = new RegistrationServiceClient();
     * try {
     *     $endpoint = new Endpoint();
     *     $updateMask = new FieldMask();
     *     $response = $registrationServiceClient->updateEndpoint($endpoint, $updateMask);
     * } finally {
     *     $registrationServiceClient->close();
     * }
     * ```
     *
     * @param Endpoint  $endpoint     Required. The updated endpoint.
     * @param FieldMask $updateMask   Required. List of fields to be updated in this request.
     * @param array     $optionalArgs {
     *                                Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\Cloud\ServiceDirectory\V1\Endpoint
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function updateEndpoint($endpoint, $updateMask, array $optionalArgs = [])
    {
        $request = new UpdateEndpointRequest();
        $request->setEndpoint($endpoint);
        $request->setUpdateMask($updateMask);

        $requestParams = new RequestParamsHeaderDescriptor([
          'endpoint.name' => $request->getEndpoint()->getName(),
        ]);
        $optionalArgs['headers'] = isset($optionalArgs['headers'])
            ? array_merge($requestParams->getHeader(), $optionalArgs['headers'])
            : $requestParams->getHeader();

        return $this->startCall(
            'UpdateEndpoint',
            Endpoint::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Deletes a endpoint.
     *
     * Sample code:
     * ```
     * $registrationServiceClient = new RegistrationServiceClient();
     * try {
     *     $formattedName = $registrationServiceClient->endpointName('[PROJECT]', '[LOCATION]', '[NAMESPACE]', '[SERVICE]', '[ENDPOINT]');
     *     $registrationServiceClient->deleteEndpoint($formattedName);
     * } finally {
     *     $registrationServiceClient->close();
     * }
     * ```
     *
     * @param string $name         Required. The name of the endpoint to delete.
     * @param array  $optionalArgs {
     *                             Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function deleteEndpoint($name, array $optionalArgs = [])
    {
        $request = new DeleteEndpointRequest();
        $request->setName($name);

        $requestParams = new RequestParamsHeaderDescriptor([
          'name' => $request->getName(),
        ]);
        $optionalArgs['headers'] = isset($optionalArgs['headers'])
            ? array_merge($requestParams->getHeader(), $optionalArgs['headers'])
            : $requestParams->getHeader();

        return $this->startCall(
            'DeleteEndpoint',
            GPBEmpty::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Gets the IAM Policy for a resource (namespace or service only).
     *
     * Sample code:
     * ```
     * $registrationServiceClient = new RegistrationServiceClient();
     * try {
     *     $resource = '';
     *     $response = $registrationServiceClient->getIamPolicy($resource);
     * } finally {
     *     $registrationServiceClient->close();
     * }
     * ```
     *
     * @param string $resource     REQUIRED: The resource for which the policy is being requested.
     *                             See the operation documentation for the appropriate value for this field.
     * @param array  $optionalArgs {
     *                             Optional.
     *
     *     @type GetPolicyOptions $options
     *          OPTIONAL: A `GetPolicyOptions` object for specifying options to
     *          `GetIamPolicy`. This field is only used by Cloud IAM.
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\Cloud\Iam\V1\Policy
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function getIamPolicy($resource, array $optionalArgs = [])
    {
        $request = new GetIamPolicyRequest();
        $request->setResource($resource);
        if (isset($optionalArgs['options'])) {
            $request->setOptions($optionalArgs['options']);
        }

        $requestParams = new RequestParamsHeaderDescriptor([
          'resource' => $request->getResource(),
        ]);
        $optionalArgs['headers'] = isset($optionalArgs['headers'])
            ? array_merge($requestParams->getHeader(), $optionalArgs['headers'])
            : $requestParams->getHeader();

        return $this->startCall(
            'GetIamPolicy',
            Policy::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Sets the IAM Policy for a resource (namespace or service only).
     *
     * Sample code:
     * ```
     * $registrationServiceClient = new RegistrationServiceClient();
     * try {
     *     $resource = '';
     *     $policy = new Policy();
     *     $response = $registrationServiceClient->setIamPolicy($resource, $policy);
     * } finally {
     *     $registrationServiceClient->close();
     * }
     * ```
     *
     * @param string $resource     REQUIRED: The resource for which the policy is being specified.
     *                             See the operation documentation for the appropriate value for this field.
     * @param Policy $policy       REQUIRED: The complete policy to be applied to the `resource`. The size of
     *                             the policy is limited to a few 10s of KB. An empty policy is a
     *                             valid policy but certain Cloud Platform services (such as Projects)
     *                             might reject them.
     * @param array  $optionalArgs {
     *                             Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\Cloud\Iam\V1\Policy
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function setIamPolicy($resource, $policy, array $optionalArgs = [])
    {
        $request = new SetIamPolicyRequest();
        $request->setResource($resource);
        $request->setPolicy($policy);

        $requestParams = new RequestParamsHeaderDescriptor([
          'resource' => $request->getResource(),
        ]);
        $optionalArgs['headers'] = isset($optionalArgs['headers'])
            ? array_merge($requestParams->getHeader(), $optionalArgs['headers'])
            : $requestParams->getHeader();

        return $this->startCall(
            'SetIamPolicy',
            Policy::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Tests IAM permissions for a resource (namespace or service only).
     *
     * Sample code:
     * ```
     * $registrationServiceClient = new RegistrationServiceClient();
     * try {
     *     $resource = '';
     *     $permissions = [];
     *     $response = $registrationServiceClient->testIamPermissions($resource, $permissions);
     * } finally {
     *     $registrationServiceClient->close();
     * }
     * ```
     *
     * @param string   $resource     REQUIRED: The resource for which the policy detail is being requested.
     *                               See the operation documentation for the appropriate value for this field.
     * @param string[] $permissions  The set of permissions to check for the `resource`. Permissions with
     *                               wildcards (such as '*' or 'storage.*') are not allowed. For more
     *                               information see
     *                               [IAM Overview](https://cloud.google.com/iam/docs/overview#permissions).
     * @param array    $optionalArgs {
     *                               Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\Cloud\Iam\V1\TestIamPermissionsResponse
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function testIamPermissions($resource, $permissions, array $optionalArgs = [])
    {
        $request = new TestIamPermissionsRequest();
        $request->setResource($resource);
        $request->setPermissions($permissions);

        $requestParams = new RequestParamsHeaderDescriptor([
          'resource' => $request->getResource(),
        ]);
        $optionalArgs['headers'] = isset($optionalArgs['headers'])
            ? array_merge($requestParams->getHeader(), $optionalArgs['headers'])
            : $requestParams->getHeader();

        return $this->startCall(
            'TestIamPermissions',
            TestIamPermissionsResponse::class,
            $optionalArgs,
            $request
        )->wait();
    }
}
