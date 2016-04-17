<!-- File: /app/View/Posts/index.ctp -->

<h1>Blog posts</h1>
<p><?php echo $this->Html->link('Add User', array('action' => 'add')); ?></p>
<table>
    <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Actions</th>
        <th>Created</th>
    </tr>

<!-- Here's where we loop through our $users array, printing out post info -->
<?php //var_dump($users);die;?>
    <?php foreach ($users as $users): ?>
    <tr>
        <td><?php echo $users['User']['id']; ?></td>
        <td>
            <?php
                echo $this->Html->link(
                    $users['User']['username'],
                    array('action' => 'view', $users['User']['id'])
                );
            ?>
        </td>
        <td>
            <?php
                echo $this->Form->postLink(
                    'Delete',
                    array('action' => 'delete', $users['User']['id']),
                    array('confirm' => 'Are you sure?')
                );
            ?>
            <?php
                echo $this->Html->link(
                    'Edit', array('action' => 'edit', $users['User']['id'])
                );
            ?>
        </td>
        <td>
            <?php echo $users['User']['created']; ?>
        </td>
    </tr>
    <?php endforeach; ?>

</table>