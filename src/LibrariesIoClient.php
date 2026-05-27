<?php

declare(strict_types=1);

namespace Ghostwriter\LibrariesIo;

use Ghostwriter\Clock\Interface\ClockInterface;
use Ghostwriter\Container\Container;
use Ghostwriter\EventDispatcher\Interface\EventDispatcherInterface;
use Ghostwriter\LibrariesIo\Exception\LibrariesIoClientException;
use Ghostwriter\LibrariesIo\Interface\ApiTokenInterface;
use Ghostwriter\LibrariesIo\Interface\BaseUriInterface;
use Ghostwriter\LibrariesIo\Interface\LibrariesIoClientInterface;
use Ghostwriter\LibrariesIo\Interface\UserAgentInterface;
use Ghostwriter\Uuid\Uuid;
use Override;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\UriFactoryInterface;
use Psr\Http\Message\UriInterface;
use Throwable;

use const PHP_QUERY_RFC3986;

use function http_build_query;
use function is_string;
use function mb_strtoupper;
use function sprintf;

/**
 * @see LibrariesIoTest
 */
final readonly class LibrariesIoClient implements LibrariesIoClientInterface
{
    public function __construct(
        private ApiTokenInterface $apiKey,
        private BaseUriInterface $baseUri,
        private ClientInterface $client,
        private ClockInterface $clock,
        private EventDispatcherInterface $eventDispatcher,
        private RequestFactoryInterface $requestFactory,
        private UriFactoryInterface $uriFactory,
        private UserAgentInterface $userAgent,
    ) {}

    public static function new(?string $apiKey = null): self
    {
        $container = Container::getInstance();

        if (is_string($apiKey)) {
            $container->set(ApiToken::class, ApiToken::new($apiKey));
        }

        return $container->get(self::class);
    }

    #[Override]
    public function delete(string $endpoint, array $query = []): ResponseInterface
    {
        $uri = $this->createUri($endpoint, $query);

        $request = $this->createRequest(__FUNCTION__, $uri);

        return $this->sendRequest($request);
    }

    #[Override]
    public function get(string $endpoint, array $query = []): ResponseInterface
    {
        $uri = $this->createUri($endpoint, $query);

        $request = $this->createRequest(__FUNCTION__, $uri);

        return $this->sendRequest($request);
    }

    #[Override]
    public function post(string $endpoint, array $query = []): ResponseInterface
    {
        $uri = $this->createUri($endpoint, $query);

        $request = $this->createRequest(__FUNCTION__, $uri);

        return $this->sendRequest($request);
    }

    #[Override]
    public function put(string $endpoint, array $query = []): ResponseInterface
    {
        $uri = $this->createUri($endpoint, $query);

        $request = $this->createRequest(__FUNCTION__, $uri);

        return $this->sendRequest($request);
    }

    private function createRequest(string $method, UriInterface $uri): RequestInterface
    {
        return $this->requestFactory
            ->createRequest(mb_strtoupper($method), $uri)
            ->withHeader('User-Agent', $this->userAgent->toString())
            ->withHeader('X-Request-Id', Uuid::new($this->clock->now())->toString());
    }

    /**
     * @param string                   $endpoint
     * @param array<string,int|string> $query
     */
    private function createUri(string $endpoint, array $query = []): UriInterface
    {
        $query['api_key'] = $this->apiKey->toString();

        return $this->uriFactory
            ->createUri($this->baseUri->toString() . $endpoint)
            ->withQuery(http_build_query($query, '', '&', PHP_QUERY_RFC3986));
    }

    private function sendRequest(RequestInterface $request): ResponseInterface
    {
        $this->eventDispatcher->dispatch($request);

        // TODO: Use request ID from the request and use it in the events.
        // $requestId = $request->getHeaderLine('X-Request-Id');

        //  $this->eventDispatcher->dispatch(
        //      new RequestEvent($requestId, $createRequest)
        //  );

        try {
            $response = $this->client->sendRequest($request);

            //  $this->eventDispatcher->dispatch(
            //      new ResponseEvent($requestId, $response)
            //  );
        } catch (Throwable $throwable) {
            //  $this->eventDispatcher->dispatch(
            //      new ErrorEvent($requestId, $request, $throwable)
            //  );

            throw new LibrariesIoClientException(sprintf(
                'An error occurred while sending the request: %s',
                $throwable->getMessage()
            ), 255, $throwable);
        }

        $this->eventDispatcher->dispatch($response);

        return $response;
    }
}
