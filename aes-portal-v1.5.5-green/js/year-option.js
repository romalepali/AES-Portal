function add_new()
{
    window.location.href='year-new.php';
}

function delete_id(id)
{
    if(confirm('Are you sure you want to delete the data?'))
    {
        window.location.href='year.php?delete_id='+id;
    }
}

function update_id(id)
{
    if(confirm('Are you sure you want to update the data?'))
    {
        window.location.href='year-update.php?update_id='+id;
    }
}