<?php

class ConfigApi
{
    public static $RESOURCE = 'resource';
    public static $PARAMS = 'params';
    public static $RESOURCES = [
      'comentario#GET' => 'ComentarioApiController#GetComentario',
      'comentario#POST' => 'ComentarioApiController#InsertComentario',
      'comentario#PUT' => 'ComentarioApiController#UpdateComentario',
      'comentario#DELETE' => 'ComentarioApiController#DeleteComentario',
      'cine#GET' => 'CineApiController#GetCine',
    ];

}
 
 ?>
