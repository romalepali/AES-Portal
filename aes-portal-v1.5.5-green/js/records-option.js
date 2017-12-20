function update_id(id)
{
    if(confirm('Are you sure you want to update the data?'))
    {
        window.location.href='records-update-upload.php?update_id='+id;
    }
}