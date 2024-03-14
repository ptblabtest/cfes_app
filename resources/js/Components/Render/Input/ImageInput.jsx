import React, { useState, useEffect } from "react";

const ImageInput = ({ name, onChange, item }) => {
    const [imagePreview, setImagePreview] = useState(null);

    useEffect(() => {
        if (item && item.media) {
            const imageItem = item.media.find(
                (media) => media.collection_name === name
            );
            if (imageItem) {
                const imageUrl = `/media/${imageItem.id}/${imageItem.file_name}`;
                setImagePreview(imageUrl);
            }
        }
    }, [item, name]);

    const handleImageChange = (e) => {
        onChange(e); // Pass the event back up to the parent component

        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onloadend = () => {
                setImagePreview(reader.result); // Preview the selected image
            };
            reader.readAsDataURL(file);
        }
    };

    return (
        <>
            <input
                id={name}
                type="file"
                name={name}
                onChange={handleImageChange}
                className="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                aria-label={name}
                accept="image/*"
            />
            {imagePreview && (
                <div>
                    <img
                        src={imagePreview}
                        alt="Preview"
                        className="mt-2 w-full max-w-xs"
                    />
                </div>
            )}
        </>
    );
};

export default ImageInput;
