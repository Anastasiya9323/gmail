<?php

private $name;
private $scope;
private $credentialsPath;
private $tokenPath;

public function __construct(array $params)
{
    if (!$params['credentials']) {
      throw new Exception("Path to credentials is required");
    }
    $this->credentialsPath = $params['credentials'];

    if (!$params['token']) {
      throw new Exception("Path to token is required");
    }
    $this->tokenPath = $params['token'];
    $this->name = $params['name'] ?? 'Gmail API PHP';
    $this->scope = $params['scope'] ?? Google_Service_Gmail::GMAIL_READONLY;
}

public function getService()
{
    $client = self::getClient();
    return new Google_Service_Gmail($client);
}