<script>
    $(document).ready(function () {

  // Get references to the button and modal
  const modal = $("#myModal");
  const modalData = $("#modalData");
  const musicID = $("#musicID");
  // Function to open the modal with the specified data
  function openModalWithData(dataId) {
    // Set the data inside the modal content
    modalData.text("Data ID: " + dataId);
    musicID.val(dataId);
    // Display the modal
    modal.css("display", "block");
  }

  // Add click event listeners to all open modal buttons

  // When the user clicks the close button or outside the modal, close it
  modal.click(function (event) 
  {
    if (event.target === modal[0] || $(event.target).hasClass("close")) 
    {
      modal.css("display", "none");
    }
  });

</script>