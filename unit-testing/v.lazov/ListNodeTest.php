<?php

include "LinkedList.php";

use PHPUnit\Framework\TestCase;

class ListNodeTest extends TestCase {

  public function testReadNode(){
    // Arrange
    $data = "TEST";

    // Act
    $node = new ListNode($data);

    // Assert
    $this->assertEquals($data, $node->readNode());
  }

}