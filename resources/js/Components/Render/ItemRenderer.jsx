import PropTypes from "prop-types";
import React from "react";
import { ImageModal } from "../Modal/Modal";
import { useState } from "react";

const ItemRenderer = ({ item, fieldKey, fieldConfig, imageSize }) => {
    const [isModalOpen, setIsModalOpen] = useState(false);
    const [currentImageUrl, setCurrentImageUrl] = useState("");

    const handleImageClick = (imageUrl) => {
        setCurrentImageUrl(imageUrl);
        setIsModalOpen(true);
    };

    if (fieldConfig.relation) {
        const relationKeys = fieldConfig.relation.split(".");
        let relatedValue = item;

        for (const key of relationKeys) {
            relatedValue = relatedValue ? relatedValue[key] : null;
        }

        return relatedValue || "---";
    }

    switch (fieldConfig.type) {
        case "text":
            return item[fieldKey];
        case "date":
            return new Date(item[fieldKey]).toLocaleDateString("id-ID");
        case "email":
            return <a href={`mailto:${item[fieldKey]}`}>{item[fieldKey]}</a>;
        case "url":
            return (
                <a
                    href={item[fieldKey]}
                    target="_blank"
                    rel="noopener noreferrer"
                >
                    {item[fieldKey]}
                </a>
            );
        case "number":
            const formatter = new Intl.NumberFormat("id-ID");
            return formatter.format(item[fieldKey]);
        case "currency":
            return `$${item[fieldKey].toFixed(2)}`;
        case "list":
            return item[fieldKey].join(", ");
        case "file":
            const fileItem =
                item.media && item.media.length > 0 ? item.media[0] : null;
            const fileUrl = fileItem
                ? `/media/${fileItem.id}/${fileItem.file_name}`
                : null;

            return fileUrl ? (
                <a href={fileUrl} download>
                    Download File
                </a>
            ) : (
                "No File"
            );
        case "image":
            const mediaItem =
                item.media && item.media.length > 0 ? item.media[0] : null;
            const imageUrl = mediaItem
                ? `/media/${mediaItem.id}/${mediaItem.file_name}`
                : null;
            const defaultSize = "400px";
            const imageStyle = {
                width: (imageSize && imageSize.width) || defaultSize,
                height: (imageSize && imageSize.height) || defaultSize,
            };
            return imageUrl ? (
                <>
                    <img
                        src={imageUrl}
                        alt={fieldKey}
                        style={imageStyle}
                        onClick={() => handleImageClick(imageUrl)}
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
        case "readonly":
            return <span>{item[fieldKey]}</span>;

        default:
            return item[fieldKey];
    }
};

ItemRenderer.propTypes = {
    item: PropTypes.object.isRequired,
    fieldKey: PropTypes.string.isRequired,
    fieldConfig: PropTypes.object.isRequired,
};

export default ItemRenderer;
