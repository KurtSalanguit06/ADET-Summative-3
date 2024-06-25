<div class="card">
    <div class="card-header">
        <h3 class="card-title">All Tasks</h3>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $tasks = getTasks();
                if (count($tasks) > 0) {
                    foreach ($tasks as $task) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($task['title']) . "</td>";
                        echo "<td>" . htmlspecialchars($task['description']) . "</td>";
                        echo "<td>
                            <a href='edit.php?id={$task['id']}' class='btn btn-info'>Edit</a>
                            <a href='delete.php?id={$task['id']}' class='btn btn-danger'>Delete</a>
                            </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='3' class='text-center'>No tasks found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
