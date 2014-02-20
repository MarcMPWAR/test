<?php
namespace Development;

class CarControl
{
	/**
	 * Configura las luces de nuestro coche en functión del input configurado por el usuario.
	 * @param Lights $lights
	 */
	public function setLights( Lights $lights )
	{
		$electronics = Electronics::getInstance();
		$electronics->setLights( $lights );
	}

	/**
	 * Nos permite mover el coche hacia adelante.
	 * @param Electronics $electronics
	 */
	public function goForward( Electronics $electronics )
	{
		$statusPanel = new StatusPanel();
		if ( $statusPanel->engineIsRunning() && $statusPanel->thereIsEnoughFuel() )
		{
			$electronics->accelerate();
		}
	}

	/**
	 * Nos permite mover el coche hacia adelante con la funcionalidad Turbo. Si no tenemos como mínimo 100 de fuel esta opción no es posible.
	 * @param Electronics $electronics
	 */
	public function goTurboForward( Electronics $electronics )
	{
		$statusPanel = new StatusPanel();
		if ( $statusPanel->engineIsRunning() && $statusPanel->thereIsEnoughFuel( 100 ) )
		{
			$electronics->accelerate();
		}
	}
}