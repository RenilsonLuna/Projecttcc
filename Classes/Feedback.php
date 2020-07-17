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

    public function denunciar($evento, $usuario, $denuncia)
    {
        $denunciar = $this->conexao->insert('tb_denuncias', [
          'cd_usuario' => $usuario,
          'cd_evento' => $evento,
          'nm_assunto_denuncia' => $denuncia
        ]);
    }
    // ---------------- #FUTURAS RECUPERAÇÕES -------------------

    public function recFeedbacks()
    {
      $rec = $this->conexao->select('SELECT * FROM tb_feedbacks ORDER BY dt_publicacao DESC');
      return $rec;
    }

    public function excluirFeedback($feedback)
    {
      $this->conexao->delete("tb_feedbacks", sprintf("cd_feedback = %s", $feedback));
    }

    public function recDenuncias()
    {
      $rec = $this->conexao->select("SELECT * FROM tb_denuncias ORDER BY cd_denuncia DESC");
      return $rec;
    }

    public function excluirDenuncia($denuncia)
    {
      $this->conexao->delete('tb_denuncias', sprintf("cd_denuncia = %s", $denuncia));
    }
}
