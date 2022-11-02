<?php

    use WS\ReduceMigrations\Tests\Cases\AgentBuilderCase;
    use WS\ReduceMigrations\Tests\Cases\EventsBuilderCase;
    use WS\ReduceMigrations\Tests\Cases\FormBuilderCase;
    use WS\ReduceMigrations\Tests\Cases\HighLoadBlockBuilderCase;
    use WS\ReduceMigrations\Tests\Cases\IblockBuilderCase;
    use WS\ReduceMigrations\Tests\Cases\TableBuilderCase;

    return array(
    'run' => array(
        'name' => 'WorkSolutions. Reduce Migrations module',
        'report' => array(
            'completed' => 'Completed',
            'assertions' => 'Assertions'
        )
    ),
    'cases' => array(
        IblockBuilderCase::className() => array(
            'name' => 'IblockBuilder test',
            'description' => '',
            'errors' => array(
            )
        ),
        HighLoadBlockBuilderCase::className() => array(
            'name' => 'HighLoadBlockBuilder',
            'description' => '',
            'errors' => array(
            )
        ),
        AgentBuilderCase::className() => array(
            'name' => 'AgentBuilder',
            'description' => '',
            'errors' => array(
            )
        ),
        EventsBuilderCase::className() => array(
            'name' => 'EventsBuilder',
            'description' => '',
            'errors' => array(
            )
        ),
        FormBuilderCase::className() => array(
            'name' => 'FormBuilder',
            'description' => '',
            'errors' => array(
            )
        ),
        TableBuilderCase::className() => array(
            'name' => 'TableBuilder',
            'description' => '',
            'errors' => array(
            )
        ),
    )
);
