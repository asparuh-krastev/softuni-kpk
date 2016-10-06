<?php

include "LinkedList.php";

use PHPUnit\Framework\TestCase;

class ListNodeTest extends TestCase {

  public function testReadNode(){
    $data = "TEST";

    $node = new ListNode($data);

    $this->assertEquals($data, $node->readNode());
  }
}