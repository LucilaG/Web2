<?php

class ConfigApi
{
    public static $RESOURCE = 'resource';
    public static $PARAMS = 'params';
    public static $RESOURCES = [
      'comentario#GET' => 'ComentarioApiController#GetComentario',
      'comentario#POST' => 'ComentarioApiController#InsertComentario',
      'cine#GET' => 'CineApiController#GetCine',
    ];

}
 
 ?>
