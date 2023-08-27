axios
    .post("/submit", formData)
    .then((response) => {
        // Handle success if needed
    })
    .catch((error) => {
        if (error.response.data.reload) {
            window.location.reload();
        }
    });
