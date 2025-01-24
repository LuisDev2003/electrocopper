<?php

require_once 'conexion.php';

class Servicio extends Conexion
{
	private $conexion;

	public function __construct()
	{
		$this->conexion = parent::getConexion();
	}

	/**
	 * @return array<int, array{servicio_id: int, nombre: string, imagen: string, en_inicio: string}>
	 */
	public function getToHome(): array
	{
		try {
			$consulta = $this->conexion->prepare('CALL spu_servicio_inicio_listar()');
			$consulta->execute();

			return $consulta->fetchAll(PDO::FETCH_ASSOC);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function getMenu()
	{
		try {
			$consulta = $this->conexion->prepare('CALL spu_menu_servicio_listar()');
			$consulta->execute();

			return $consulta->fetchAll(PDO::FETCH_ASSOC);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function getAll()
	{
		try {
			$consulta = $this->conexion->prepare('CALL spu_servicio_listar()');
			$consulta->execute();

			return $consulta->fetchAll(PDO::FETCH_ASSOC);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function getById($data = [])
	{
		try {
			$consulta = $this->conexion->prepare('CALL spu_servicio_buscar(?)');
			$consulta->execute(
				array(
					$data['servicio_id']
				)
			);

			return $consulta->fetch(PDO::FETCH_ASSOC);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function create($data = [])
	{
		try {
			$consulta = $this->conexion->prepare('CALL spu_servicio_registrar(?,?,?,?,?)');
			$consulta->execute(
				array(
					$data['nombre'],
					$data['categoria_id'],
					$data['descripcion'],
					$data['precio'],
					$data['imagen'],
				)
			);

			return ["success" => true];
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function update($data = [])
	{
		try {
			$consulta = $this->conexion->prepare('CALL spu_servicio_actualizar(?,?,?,?,?,?)');
			$consulta->execute(
				array(
					$data['servicio_id'],
					$data['categoria_id'],
					$data['nombre'],
					$data['descripcion'],
					$data['precio'],
					$data['imagen'],
				)
			);

			return ["success" => true];
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function delete($id)
	{
		try {
			$consulta = $this->conexion->prepare('CALL spu_servicio_eliminar(?)');
			$consulta->execute(
				array($id)
			);

			return ["success" => true];
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}
}
