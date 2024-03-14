import ImageModal from "@/Components/Modal/ImageModal";
import React, { useState } from "react";

const ImageComponent = ({ media }) => {
    const [isModalOpen, setIsModalOpen] = useState(false);
    const [currentImageUrl, setCurrentImageUrl] = useState("");

    const handleImageClick = (imageUrl) => {
        setCurrentImageUrl(imageUrl);
        setIsModalOpen(true);
    };

    const mediaItem = media && media.length > 0 ? media[0] : null;
    const imageUrl = mediaItem ? `/media/${mediaItem.id}/${mediaItem.file_name}` : null;

    return imageUrl ? (
        <>
            <img
                src={imageUrl}
                alt="Item"
                onClick={() => handleImageClick(imageUrl)}
                style={{ cursor: 'pointer' }}
            />
            <ImageModal
                isOpen={isModalOpen}
                onClose={() => setIsModalOpen(false)}
                imageUrl={currentImageUrl}
            />
        </>
    ) : (
        "No Image"
    );
};

export default ImageComponent;
