<?php
/*
Plugin Name: Formulário de Contato
Description: Um form simples.
Version: 1.0
Author: Felipe Figueiredo
*/
 
function html_form_code() {
    echo '<form action="' . esc_url( $_SERVER['REQUEST_URI'] ) . '" method="post">';
    echo '<p>';
    echo 'Seu nome (obrigatório) <br/>';
    echo '<input type="text" name="input-nome" pattern="[a-zA-Z0-9 ]+" value="' . ( isset( $_POST["input-nome"] ) ? esc_attr( $_POST["input-nome"] ) : '' ) . '" size="40" />';
    echo '</p>';
    echo '<p>';
    echo 'Email (obrigatório) <br/>';
    echo '<input type="email" name="input-email" value="' . ( isset( $_POST["input-email"] ) ? esc_attr( $_POST["input-email"] ) : '' ) . '" size="40" />';
    echo '</p>';
    echo '<p>';
    echo 'Telefone (obrigatório) <br/>';
    echo '<input type="text" name="telefone" value="' . ( isset( $_POST["telefone"] ) ? esc_attr( $_POST["telefone"] ) : '' ) . '">';
    echo '</p>';
    echo '<p><input type="submit" name="btn-enviar" value="Enviar"></p>';
    echo '</form>';
}
 
function deliver_mail() {
 
    // botão enviar
    if ( isset( $_POST['btn-enviar'] ) ) {
 
        // sanitize
        $name     = sanitize_text_field( $_POST["input-nome"] );
        $email    = sanitize_email( $_POST["input-email"] );
        $telefone = sanitize_text_field( $_POST["telefone"] );
 
        // get the blog administrator's email address
        $to = get_option( 'admin_email' );
        $args = array (
            'token_rdstation' => RD_STATION_TOKEN,
            'identificador'   => RD_STATION_IDENTIFICACAO,
            'email'           => $email,
            'nome'            => $name,
            'telefone'        => $telefone
            );
 
        // Form Enviado
        if ( wp_remote_post(RD_STATION_API, $args)) {
            echo '<div>';
            echo '<p>O Formulário foi enviado com sucesso!</p>';
            echo '</div>';
        } else {
            echo 'Ops, há algum erro!';
        }
    }
}
 
function form_shortcode() {
    ob_start();
    deliver_mail();
    html_form_code();
 
    return ob_get_clean();
}
 
add_shortcode( 'formulario_rd_station', 'form_shortcode' );
 
?>