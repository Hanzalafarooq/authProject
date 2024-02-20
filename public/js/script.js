const productForm = document.getElementById('productForm');
const imageInput = document.getElementById('image');
const galleryInput = document.getElementById('gallery');
const imagePreview = document.getElementById('imagePreview');
const galleryPreview = document.getElementById('galleryPreview');

// Function to preview the selected image
function previewImage(input, previewContainer) {
  previewContainer.innerHTML = '';
  if (input.files) {
    const files = Array.from(input.files);
    files.forEach((file) => {
      const reader = new FileReader();
      reader.onload = function (event) {
        const imageElement = document.createElement('img');
        imageElement.src = event.target.result;
        imageElement.classList.add('preview-image');
        previewContainer.appendChild(imageElement);

        // Add a button to remove the image
        const removeButton = document.createElement('button');
        removeButton.innerHTML = 'Remove';
        removeButton.classList.add('remove-button');
        removeButton.addEventListener('click', () => {
          previewContainer.removeChild(imageElement);
          previewContainer.removeChild(removeButton);
          input.value = ''; // Clear the file input value
        });
        previewContainer.appendChild(removeButton);
      };
      reader.readAsDataURL(file);
    });
  }
}

// Listen for changes in the file inputs and call the preview functions
imageInput.addEventListener('change', () => previewImage(imageInput, imagePreview));
galleryInput.addEventListener('change', () => previewImage(galleryInput, galleryPreview));
