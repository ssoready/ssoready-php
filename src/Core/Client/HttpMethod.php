<?php

namespace Ssoready\Core\Client;

enum HttpMethod
{
    case GET;
    case POST;
    case PUT;
    case PATCH;
    case DELETE;
}
