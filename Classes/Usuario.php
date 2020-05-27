<?php

namespace Classes;

class Usuario
{
	private $id;
	private $name;
	private $email;
	private $cnpj;
	private $conexao;


	public function __construct(Database $conexao)
	{
		$this->conexao = $conexao;
	}

	# ----- get e set -------- # 
	public function __get($attr)
	{
		return $this->$attr;
	}

	public function __set($attr, $value)
	{
		$this->$attr = $value;
		return $this;
	}


	# -------------- cadastro e login --------------- # 
	public function logar($email, $senha)
	{
	    $select = $this->conexao->select("SELECT * FROM tb_usuarios WHERE cd_email_usuario = :e AND cd_senha_usuario = :s", [
	        'e' => $email,
	        's' => $senha
	    ], \PDO::FETCH_ASSOC);
	    if(count($select) >= 1){
            return $select;
	    }else{
	        return false;
	    }
	}

	public function cadastrar($nome, $email, $senha, $cnpj, $cpf, $img, $tipo)
	{
		$this->conexao->insert('tb_usuarios', [
			'nm_usuario' => $nome,
			'cd_email_usuario' => $email,
			'cd_senha_usuario' => $senha,
			'cd_tipo_usuario' => $tipo,
			'cd_cnpj_usuario' => $cnpj,
			'cd_cpf_usuario' => $cpf,
			'cd_img_perfil' => $img
			
		]);
	}
}