![](https://i.imgur.com/OhtkhbJ.png)

# SSOReady-PHP: SAML & SCIM for PHP

[![](https://img.shields.io/packagist/v/ssoready/ssoready)](https://packagist.org/packages/ssoready/ssoready)

`ssoready/ssoready` is a PHP SDK for the [SSOReady](https://ssoready.com) API.

SSOReady is a set of open-source dev tools for implementing Enterprise SSO. You
can use SSOReady to add SAML and SCIM support to your product this afternoon.

For example applications built using SSOReady-PHP, check out:

- [SSOReady Example App: PHP + Laravel with SAML](https://github.com/ssoready/ssoready-example-app-php-laravel-saml)
- [SSOReady Example App: Vanilla PHP with SAML](https://github.com/ssoready/ssoready-example-app-php-saml)

## Installation

Add this dependency to your project's `composer.json`:

```bash
composer require ssoready/ssoready
```

## Usage

This section provides a high-level overview of how SSOReady works, and how it's
possible to implement SAML and SCIM in just an afternoon. For a more thorough
introduction, visit the [SAML
quickstart](https://ssoready.com/docs/saml/saml-quickstart) or the [SCIM
quickstart](https://ssoready.com/docs/scim/scim-quickstart).

The first thing you'll do is create a SSOReady client instance:

```php
$ssoready = new SSOReady\SSOReadyClient(); // loads api key from SSOREADY_API_KEY env var
```

### SAML in two lines of code

SAML (aka "Enterprise SSO") consists of two steps: an _initiation_ step where
you redirect your users to their corporate identity provider, and a _handling_
step where you log them in once you know who they are.

To initiate logins, you'll use SSOReady's [Get SAML Redirect
URL](https://ssoready.com/docs/api-reference/saml/get-saml-redirect-url)
endpoint:

```php
# this is how you implement a "Sign in with SSO" button
$redirectUrl = $ssoready->saml->getSAMLRedirectURL(new SSOReady\Saml\Requests\GetSamlRedirectUrlRequest([
    # the ID of the organization/workspace/team (whatever you call it)
    # you want to log the user into
    "organizationExternalId" => "...",
]))->redirectUrl;

# redirect the user to `$redirectUrl`...
```

You can use whatever your preferred ID is for organizations (you might call them
"workspaces" or "teams") as your `organizationExternalId`. You configure those
IDs inside SSOReady, and SSOReady handles keeping track of that organization's
SAML and SCIM settings.

To handle logins, you'll use SSOReady's [Redeem SAML Access
Code](https://ssoready.com/docs/api-reference/saml/redeem-saml-access-code) endpoint:

```php
# this goes in your handler for POST /ssoready-callback
$redeemResult = $ssoready->saml->redeemSamlAccessCode(new SSOReady\Saml\Requests\RedeemSamlAccessCodeRequest([
    "samlAccessCode" => $_GET["saml_access_code"],
]));

$email = $redeemResult->email;
$organizationExternalId = $redeemResult->organizationExternalId;

# log the user in as `$email` inside `$organizationExternalId`...
```

You configure the URL for your `/ssoready-callback` endpoint in SSOReady.

### SCIM in one line of code

SCIM (aka "Enterprise directory sync") is basically a way for you to get a list
of your customer's employees offline.

To get a customer's employees, you'll use SSOReady's [List SCIM
Users](https://ssoready.com/docs/api-reference/scim/list-scim-users) endpoint:

```php
$listScimUsersResponse = $ssoready->scim->listScimUsers(new SSOReady\Scim\Requests\ListScimUsersRequest([
    "organizationExternalId" => "my_custom_external_id"
]));

# create users from each scim user
foreach ($listScimUsersResponse->scimUsers as $scimUser) {
    # every $scimUser has an id, email, attributes, and deleted
}
```

## Contributing

Issues and PRs are more than welcome. Be advised that this library is largely
autogenerated from [`ssoready/docs`](https://github.com/ssoready/docs). Most
code changes ultimately need to be made there, not on this repo.