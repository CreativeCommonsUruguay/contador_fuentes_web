<?php
 
/**
 * @file
 * Definition of Drupal\contador_fuentes_web\Plugin\views\field\ContadorFuentesWeb
 */
 
namespace Drupal\contador_fuentes_web\Plugin\views\field;
 
use Drupal\Core\Form\FormStateInterface;
use Drupal\node\Entity\NodeType;
use Drupal\views\Plugin\views\field\FieldPluginBase;
use Drupal\views\ResultRow;
 
/**
 * Field handler to flag the node type.
 *
 * @ingroup views_field_handlers
 *
 * @ViewsField("contador_fuentes_web")
 */
class ContadorFuentesWeb extends FieldPluginBase {
 
  /**
   * @{inheritdoc}
   */
  public function query() {
    // Leave empty to avoid a query on this field.
  }
 
  /**
   * Define the available options
   * @return array
   */
  protected function defineOptions() {
    $options = parent::defineOptions();
    $options['node_type'] = array('default' => 'article');
 
    return $options;
  }
 
  /**
   * @{inheritdoc}
   */
  public function render(ResultRow $values) {
    $node = $values->_entity;

    $titulo = $node->getTitle();

    $nidsMujeres = \Drupal::entityQuery('node')
        ->condition('type', 'autor')
        ->condition('status', 1)
        ->condition('field_enlaces.title', $titulo) // Cuantos autores hay cuyo enlace tenga el título de la fuente
        ->execute();
        
    $resultado = count ($nidsMujeres);

    return $resultado;

  }
}