<?php

class Logger
{/*
    public static function LogOperacion($request, $response, $next)
    {
        $retorno = $next($request, $response);
        return $retorno;
    }
    */
    public static function LogOperacion($request, $handler)
    {
        $requestType=$request->getMethod();
        $response = $handler->handle($request);
        $response->getBody()->write("Hola mundo, la peticion se hizo con ". $requestType);
        return $response;
    }
    public static function verificadorDeCredenciales($request, $handler)
    {
        $requestType=$request->getMethod();
        $response = $handler->handle($request);
        
        if($requestType == 'GET'){
            $response->getBody()->write('Metodo: ' . $requestType . ". No verificar");
        } else if($requestType == 'POST'){
            $response->getBody()->write('Metodo: ' . $requestType . ". Verificar");
            $dataParseada = $request->getParsedBody();
            $nombre = $dataParseada['nombre'];
            $perfil = $dataParseada['perfil'];
            if($perfil == 'admin'){
                $response->getBody()->write('Bienvenido! ' . $nombre);
            } else {
                $response->getBody()->write('Usuario no autorizado!');
            }
        }
        return $response;
    }
}