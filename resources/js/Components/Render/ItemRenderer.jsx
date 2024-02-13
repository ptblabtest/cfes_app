import React from "react";
import { useState } from "react";
import ImageModal from "../Modal/ImageModal";
import { Inertia } from "@inertiajs/inertia";
import { PaperClipIcon } from "@heroicons/react/24/outline";

const ItemRenderer = ({ item, fieldKey, fieldConfig, imageSize }) => {
    const [isModalOpen, setIsModalOpen] = useState(false);
    const [currentImageUrl, setCurrentImageUrl] = useState("");

    const formatter = new Intl.NumberFormat("id-ID");

    const handleImageClick = (imageUrl) => {
        setCurrentImageUrl(imageUrl);
        setIsModalOpen(true);
    };

    const renderStatuses = (statusItems, fieldKey) => {
        if (!statusItems || statusItems.length === 0) {
            return "No Status";
        }

        return statusItems.map((item, index) => {
            let statusClass = "";
            switch (item.approval_status.toLowerCase()) {
                case "draft":
                    statusClass = "bg-red-50 text-red-700 ring-red-600/10";
                    break;
                case "review":
                    statusClass =
                        "bg-yellow-50 text-yellow-800 ring-yellow-600/20";
                    break;
                case "approved":
                    statusClass =
                        "bg-green-50 text-green-700 ring-green-600/20";
                    break;
                default:
                    statusClass = "bg-gray-50 text-gray-600 ring-gray-500/10";
            }
            return (
                <span
                    key={`${fieldKey}-${index}`}
                    className={`inline-flex items-center rounded-md px-2 py-1 text-xs font-medium ring-1 ring-inset ${statusClass}`}
                >
                    {item.approval_status}
                </span>
            );
        });
    };

    switch (fieldConfig.type) {
        case "tor_status":
            return <span>{renderStatuses(item.tor, "tor")}</span>;

        case "btor_status":
            return <span>{renderStatuses(item.btor, "btor")}</span>;
        case "total_budget":
            const totalBudget = (item.tor || []).reduce(
                (acc, tor) => acc + parseFloat(tor.budget || 0),
                0
            );
            return <span>Rp. {formatter.format(totalBudget)}</span>;

        case "total_cost":
            const totalCost = (item.btor || []).reduce(
                (acc, btor) => acc + parseFloat(btor.cost || 0),
                0
            );
            return <span>Rp. {formatter.format(totalCost)}</span>;

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
            return formatter.format(item[fieldKey]);
        case "currency":
            return <span>Rp. {formatter.format(item[fieldKey])}</span>;
        case "list":
            return item[fieldKey].join(", ");
        case "file":
            const fileItem = item.media?.find(
                (media) => media.collection_name === fieldKey
            );
            if (!fileItem) return "No File";

            const fileUrl = `/media/${fileItem.id}/${fileItem.file_name}`;
            const fileExtension = fileItem.file_name
                .split(".")
                .pop()
                .toLowerCase();

            return (
                <li className="flex items-center justify-between py-4 pl-4 pr-5 text-sm leading-6">
                    <div className="flex w-0 flex-1 items-center">
                        <PaperClipIcon
                            className="h-5 w-5 flex-shrink-0 text-gray-400"
                            aria-hidden="true"
                        />
                        <div className="ml-4 flex min-w-0 flex-1 gap-2">
                            <span className="truncate font-medium">
                                {fileItem.file_name}
                            </span>
                        </div>
                    </div>
                    <div className="ml-4 flex-shrink-0">
                        <a
                            href={fileUrl}
                            className="font-medium text-indigo-600 hover:text-indigo-500"
                        >
                            {fileExtension === "pdf" ? "View PDF" : "Download"}
                        </a>
                    </div>
                </li>
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
        case "select":
            if (fieldConfig.relationship) {
                const relatedItem = item[fieldConfig.relationship];
                const relatedValue = relatedItem
                    ? relatedItem[fieldConfig.relation_item]
                    : "---";
                return relatedValue;
            }
            return item[fieldKey];

        case "role":
            const [selectedRole, setSelectedRole] = useState(
                item.roles[0]?.name || ""
            );

            const handleRoleChange = (e) => {
                setSelectedRole(e.target.value);
            };

            const submitRoleChange = (userId) => {
                Inertia.post("/permissions/change-role", {
                    userId: userId,
                    newRole: selectedRole,
                });
            };

            return (
                <div className="flex items-center space-x-2">
                    <select
                        className="block w-full bg-white border border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        value={selectedRole}
                        onChange={handleRoleChange}
                    >
                        {fieldConfig.options.map((role) => (
                            <option key={role} value={role}>
                                {role}
                            </option>
                        ))}
                    </select>
                    <button
                        className="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:ring-opacity-50"
                        onClick={() => submitRoleChange(item.id)}
                    >
                        Update
                    </button>
                </div>
            );

        default:
            return item[fieldKey];
    }
};

export default ItemRenderer;
