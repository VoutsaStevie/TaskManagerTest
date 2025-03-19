<?php

namespace Boumilmounir\tests;

use Boumilmounir\TestUnitaire\TaskManager;

class TaskManagerTest extends \PHPUnit\Framework\TestCase
{


    public function test__Construct()
    {
        $taskManager = new TaskManager();
        $this->assertEmpty($taskManager->getTasks());
    }
    public function testAddTask()
    {
        $taskManager = new TaskManager();
        $taskManager->addTask('task 1');
        $this->assertCount(1, $taskManager->getTasks());
        $taskManager->addTask('task 2');
        $this->assertCount(2, $taskManager->getTasks());
    }
    public function testRemoveTask()
    {
        $taskManager = new TaskManager();
        $taskManager->addTask('task 1');
        $taskManager->addTask('task 2');
        $taskManager->addTask('task 3');
        $taskManager->removeTask(1);
        $this->assertCount(2, $taskManager->getTasks());
        $this->assertEquals('task 1', $taskManager->getTask(0));
        $this->assertEquals('task 3', $taskManager->getTask(1));
    }
    public function testRemoveTaskWithInvalidIndex()
    {
        $this->expectException(\OutOfBoundsException::class);
        $this->expectExceptionMessage('Index de tâche invalide: 0');
        $taskManager = new TaskManager();
        $taskManager->removeTask(0);
    }
    public function testGetTasks()
    {
        $taskManager = new TaskManager();
        $taskManager->addTask('task 1');
        $taskManager->addTask('task 2');
        $taskManager->addTask('task 3');
        $this->assertCount(3, $taskManager->getTasks());
    }
    public function testGetTask()
    {
        $taskManager = new TaskManager();
        $taskManager->addTask('task 1');
        $taskManager->addTask('task 2');
        $taskManager->addTask('task 3');
        $this->assertEquals('task 2', $taskManager->getTask(1));
    }
    public function testGetTaskWithInvalidIndex()
    {
        $this->expectException(\OutOfBoundsException::class);
        $this->expectExceptionMessage('Index de tâche invalide: 0');
        $taskManager = new TaskManager();
        $taskManager->getTask(0);
    }

   
}