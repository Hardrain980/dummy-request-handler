<?php

namespace Leo\Fixtures;

use \Psr\Http\Server\RequestHandlerInterface;
use \Psr\Http\Message\ServerRequestInterface;
use \Psr\Http\Message\ResponseInterface;
use \Nyholm\Psr7;

class DummyRequestHandler implements RequestHandlerInterface
{
	/**
	 * Request passed in
	 * @var \Psr\Http\Message\ServerRequestInterface
	 */
	private $request;

	/**
	 * Response to be returned
	 * @var \Psr\Http\Message\ResponseInterface
	 */
	private $response;

	public function __construct(
		?ResponseInterface $response = null
	)
	{
		$this->response = $response ?? new Psr7\Response();
	}

	public function handle(ServerRequestInterface $request):ResponseInterface
	{
		$this->request = $request;

		return $this->response;
	}

	public function getRequest():ServerRequestInterface
	{
		return $this->request;
	}
}

?>
