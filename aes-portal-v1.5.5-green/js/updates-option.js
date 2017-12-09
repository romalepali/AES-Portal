function add_new()
{
    window.location.href='updates-new.php';
}
function delete_id(id)
{
    if(confirm('Are you sure you want to delete the update?'))
    {
        window.location.href='updates.php?delete_id='+id;
    }
}