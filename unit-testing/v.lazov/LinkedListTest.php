<?php

include "LinkedList.php";

use PHPUnit\Framework\TestCase;

class LinkedListTest extends TestCase {

  const NODE_DATA_BASE = "Element ";

  private function generateLinkedList($element_count) {
    $list = new LinkedList();

    for ($i = 0; $i < $element_count; $i++) {
      $data = self::NODE_DATA_BASE . $i;

      $list->insertLast($data);
    }

    return $list;
  }

  public function testIsEmpty() {
    // Arrange
    // Act
    $list = new LinkedList();

    // Assert
    $this->assertTrue($list->isEmpty(), "The list is not empty! The first element is not NULL");
  }

  public function testTotalNodes() {
    $i = 10;
    $list = $this->generateLinkedList($i);

    $this->assertEquals($i, $list->totalNodes(), "The count does not match");
  }

  /**
   * @expectedException NodeNotFoundException
   */
  public function testFind(){
    // Arrange
    $id = 10;
    $list = $this->generateLinkedList($id);

    // Act
    $id = 5;
    // Check for existing text
    $node = $list->find(self::NODE_DATA_BASE . $id);

    // Assert
    $this->assertEquals($node->readNode(), self::NODE_DATA_BASE . $id, "Node data does not match");

    // Act
    $node = $list->find("DICK!");

    // Assert is in the annotation.
  }

  /**
   * @expectedException InvalidNodeIndexException
   */
  public function testReadNode() {
    // Arrange
    $i = 10;
    $list = $this->generateLinkedList($i);

    // Act
    $id = 5;
    $node_data = $list->readNode($id);

    // Assert
    $this->assertEquals($node_data, self::NODE_DATA_BASE . ($id - 1), "Node data does not match");

    // Act
    $id = "text";
    $node_data = $list->readNode($id);

    // Assert is in the annotation
  }

  public function testReadList() {
    // Arrange
    $i = 10;
    $list = $this->generateLinkedList($i);

    // Act
    $list_data = $list->readList();

    // Assert
    for($j = 0; $j < $i; $j++) {
      $this->assertContains(self::NODE_DATA_BASE . $j, $list_data);
    }
  }

  public function testInsertFirstNode() {
    // Arrange
    $list = $this->generateLinkedList(10);
    $data = "TEST";
    $list->insertFirst($data);

    // Act
    $node_text = $list->readNode(1);

    // Assert
    $this->assertEquals($node_text, $data);
  }

  public function testInsertLast() {
    // Arrange
    $id = 10;
    $list = $this->generateLinkedList($id);
    $data = "TEST";
    $list->insertLast($data);

    // Act
    $node_text = $list->readNode($id + 1);

    // Assert
    $this->assertEquals($node_text, $data);
  }

  public function testDeleteFirst() {
    // Arrange
    $id = 10;
    $list = $this->generateLinkedList($id);

    // Act
    $list->deleteFirstNode();
    $id = 1;
    $node_text = $list->readNode($id);

    //Assert
    $this->assertEquals($node_text, self::NODE_DATA_BASE . $id);
  }

  public function testDeleteLast() {
    // Arrange
    $id = 10;
    $list = $this->generateLinkedList($id);

    // Act
    $list->deleteLastNode();
    $node_text = $list->readNode($list->totalNodes());

    //Assert
    $this->assertEquals($node_text, self::NODE_DATA_BASE . ($id - 2));
  }

  /**
   * @expectedException InvalidNodeIndexException
   */
  public function testDeleteNode() {
    // Arrange
    $id = 10;
    $list = $this->generateLinkedList($id);

    // Act
    $id = 1;
    $list->deleteNode(self::NODE_DATA_BASE . ($id - 1));
    $node_text = $list->readNode($id);

    // Assert
    $this->assertEquals($node_text, self::NODE_DATA_BASE . $id);

    $list->deleteNode("DICK!");
  }

  public function testReverseList() {
    // Arrange
    $id = 10;
    $list = $this->generateLinkedList($id);

    // Act
    $list->reverseList();
    $list_data = $list->readList();

    // Assert
    for($i = 0; $i < $id; $i++) {
      $element_data = (9) - $i;
      $element_data = self::NODE_DATA_BASE . $element_data;
      $this->assertEquals($list_data[$i], $element_data);
    }
  }
}