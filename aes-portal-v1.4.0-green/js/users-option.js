function add_new()
{
    window.location.href='users-new.php';
}
function delete_id(id)
{
    if(confirm('Are you sure you want to delete the data?'))
    {
        window.location.href='users.php?delete_id='+id;
    }
}
function activate_id(id)
{
    if(confirm('Are you sure you want to activate the account?'))
    {
        window.location.href='users.php?activate_id='+id;
    }
}
function deactivate_id(id)
{
    if(confirm('Are you sure you want to deactivate the account?'))
    {
        window.location.href='users.php?deactivate_id='+id;
    }
}