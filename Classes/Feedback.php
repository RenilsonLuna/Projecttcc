<?php

namespace Classes;

class Feedback
{
    private $id;
    private $msg_feedback;
    private $assunto;

    private $conexao;

    public function __construct(Database $conexao)
    {
      $this->conexao = $conexao;
    }

    // ------------------ GETS E SETS -------------------
    public function __get($attr)
    {
      return $this->attr;
    }

    public function __set($attr, $value)
    {
      $this->$attr = $value;
      return $this;
    }

    public function enviarFeedback($assunto, $mensagem, $id_usuario)
    {
      $this->conexao->insert('tb_feedbacks', [
        'cd_usuario' => $id_usuario,
        'nm_assunto' => $assunto,
        'cd_mensagem' => $mensagem
      ]);
    }

    // ---------------- #FUTURAS RECUPERAÇÕES -------------------
}
