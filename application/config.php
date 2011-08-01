<?php
/**
 * Definição do include_path para localização das classes
 */
ini_set( 'include_path',
	implode( PATH_SEPARATOR , array_merge(
		array( dirname( __FILE__ ) ),
		explode( PATH_SEPARATOR , ini_get( 'include_path' ) )
	) )
);

date_default_timezone_set( 'America/Sao_Paulo' );