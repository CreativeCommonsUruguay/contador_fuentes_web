<?php

/**
 * Implements hook_views_data_alter().
 */
function contador_fuentes_web_views_data_alter(array &$data) {
  $data['node']['contador_fuentes_web'] = array(
    'title' => t('Contador de fuentes web'),
    'field' => array(
      'title' => t('Contador de fuentes web'),
      'help' => t('Cuenta la cantidad de veces que una fuente web figura en los nodos.'),
      'id' => 'contador_fuentes_web',
    ),
  );
}