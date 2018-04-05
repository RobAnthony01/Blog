{{--Handle Modal--}}
<script>
    function closeModal(event) {
        document.getElementById('edit-delete-Modal').style.display = 'none';
        event.preventDefault();
    }

    function displayModal(event) {
        const modal = document.getElementById('edit-delete-Modal');
        document.getElementById('modal-hidden').value = event.target.dataset.id;
        document.getElementById('title').value = event.target.dataset.title;
        modal.style.display = 'block';
        event.preventDefault();
    }

    document.getElementById('modal-close').addEventListener('click', closeModal);
    document.getElementById('btn-cancel').addEventListener('click', closeModal);
    deleteButtons = document.getElementsByClassName('delete-button');
    for (let i = 0; i < deleteButtons.length; i++) {
        deleteButtons[i].addEventListener('click', displayModal);
    }
</script>