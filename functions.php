<?php

add_theme_support('menus');

function get_field_cmb2($key, $page_id = 0){
  $id = $page_id !== 0 ? $page_id : get_the_ID();
  return get_post_meta($id, $key, true);
}

function the_field_cmb2($key, $page_id = 0){
  echo get_field_cmb2($key, $page_id);
}

// functions.php
add_action('cmb2_admin_init', 'cmb2_fields_home');

// array('item1', 'item2') === ['item1', 'item2']
function cmb2_fields_home() {
  // Adiciona um bloco
  $cmb = new_cmb2_box([
    'id' => 'home_box', // id deve ser único
    'title' => 'Home',
    'object_types' => ['page'], // tipo de post
    'show_on' => [
      'key' => 'page-template',
      'value' => 'page-home.php',
    ], // modelo de página
  ]);

  // Adiciona um campo ao bloco criado
  $cmb->add_field([
    'name' => 'Menu da Semana',
    'id' => 'menu',
    'type' => 'text',
  ]);

  $cmb->add_field([
    'name' => 'Comida',
    'id' => 'comida',
    'type' => 'text',
  ]);

  $pratos = $cmb->add_field([
    'name' => 'Pratos',
    'id' => 'pratos',
    'type' => 'group',
    'repetable' => true,
    'options' => [
      'group_title' => 'Prato {#}',
      'add_button' => 'Adicionar',
      'remove_button' => 'Remover',
      'sortable' => true
    ]
  ]);

  $cmb->add_group_field($pratos, [
    'name' => 'Nome',
    'id' => 'nome',
    'type' => 'text',
  ]);

  $cmb->add_group_field($pratos, [
    'name' => 'Descrição',
    'id' => 'descricao',
    'type' => 'text',
  ]);

  $cmb->add_group_field($pratos, [
    'name' => 'preco',
    'id' => 'preco',
    'type' => 'text',
  ]);
}

add_action('cmb2_admin_init', 'cmb2_fields_sobre');

function cmb2_fields_sobre() {
  // Adiciona um bloco
  $cmb = new_cmb2_box([
    'id' => 'sobre_box', // id deve ser único
    'title' => 'Sobre',
    'object_types' => ['page'], // tipo de post
    'show_on' => [
      'key' => 'page-template',
      'value' => 'page-sobre.php',
    ], // modelo de página
  ]);

  $cmb->add_field([
    'name' => 'Foto Rest',
    'id' => 'foto_rest',
    'type' => 'file',
    'options' => [
      'url' => false
    ]
  ]);
}

?>
