<?php

/**
 * @license LICENCE/ExampleCMS
 */

namespace ExampleCMS\Middleware;

class CurrentUser
{

    public function __invoke(\Psr\Http\Message\ServerRequestInterface $request, \Psr\Http\Message\ResponseInterface $response, $next)
    {
        $userModule = $this->moduleFactory->get('users');
        $session = $request->getAttribute('session');
        $userId = null;

        if ($session) {
            $userId = $session->get('userId');
        }

        if ($userId) {
            $query = $userModule->getQuery('find');
            $user = $query->fetch([
                $query::CRITERIA => [
                    'id' => $userId,
                ],
                $query::LIMIT => 1,
            ]);

            if ($user) {
                return $user;
            }
        }


        $user = $userModule->getModel();
        $user->fromArray([
            'id' => '-1',
            'username' => 'guest',
            'role' => 'guest',
        ]);

        $request = $request->setAttribute('user', $user);

        return $next($request, $response);
    }

}
