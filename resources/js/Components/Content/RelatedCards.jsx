import React, { useState } from "react";
import { Link } from "@inertiajs/react";
import axios from "axios";
import StatusModal from "../Modal/StatusModal";
import CardLayout from "../Card/CardLayout";

const RelatedCards = ({ item, relation_show }) => {
    const [isModalOpen, setIsModalOpen] = useState(false);
    const [selectedItem, setSelectedItem] = useState(null);
    const [status, setStatus] = useState("");
    const [comment, setComment] = useState("");

    const handleStatusChangeClick = (entity, relatedData) => {
        setSelectedItem({ entity, id: relatedData.id });
        setStatus(relatedData.approval_status);
        setComment(relatedData.comment || "");
        setIsModalOpen(true);
    };

    const handleProjectStatusClick = (entity, relatedData) => {
        handleStatusChangeClick(entity, relatedData);
    };

    const submitStatusChange = async () => {
        try {
            await axios.post(`/${selectedItem.entity}/update-status`, {
                id: selectedItem.id,
                approval_status: status,
                comment: comment,
            });
            window.location.reload();
        } catch (error) {
            console.error("Error updating status", error);
        } finally {
            setIsModalOpen(false);
        }
    };

    const getStatusClasses = (status) => {
        switch (status) {
            case "Draft":
                return "bg-red-50 dark:bg-red-700 text-red-500"; // Red for Draft
            case "Review":
                return "bg-yellow-50 dark:bg-yellow-700 text-yellow-500"; // Yellow for Review
            case "Approved":
                return "bg-green-50 dark:bg-green-700 text-green-500"; // Green for Approved
            default:
                return "bg-gray-50 dark:bg-gray-700 text-gray-500"; // Default color
        }
    };

    return (
        <div className="mx-auto">
            <div className="max-w-5xl mx-auto sm:px-6 lg:px-8">
                {relation_show &&
                    Object.entries(relation_show).map(
                        ([relationKey, relationConfig]) => {
                            const relatedDataArray = item[relationKey];

                            return (
                                <div
                                    key={relationKey}
                                    className="mb-8 bg-white dark:bg-gray-800 rounded-lg overflow-hidden shadow-lg"
                                >
                                    {/* Card Header and Status Button */}
                                    <div
                                        className={`flex justify-between items-center p-6 ${getStatusClasses(
                                            relatedDataArray[0]?.approval_status
                                        )}`}
                                    >
                                        <h2 className="text-2xl font-bold leading-7 sm:text-3xl sm:truncate">
                                            {relationConfig.title}
                                        </h2>
                                        {relatedDataArray &&
                                            relatedDataArray.length > 0 && (
                                                <span
                                                    className="text-2xl font-bold leading-7 sm:text-3xl sm:truncate cursor-pointer"
                                                    onClick={() =>
                                                        handleProjectStatusClick(
                                                            relationKey,
                                                            relatedDataArray[0]
                                                        )
                                                    }
                                                >
                                                    {
                                                        relatedDataArray[0]
                                                            .approval_status
                                                    }
                                                </span>
                                            )}
                                    </div>

                                    {/* Card Content */}
                                    <div className="p-6">
                                        {relationConfig.isCreatable ? (
                                            <div className="text-center">
                                                <Link
                                                    href={
                                                        relationConfig.create
                                                            .url
                                                    }
                                                    className="..."
                                                >
                                                    {
                                                        relationConfig.create
                                                            .label
                                                    }
                                                </Link>
                                            </div>
                                        ) : (
                                            relatedDataArray &&
                                            relatedDataArray.map(
                                                (relatedData, index) => (
                                                    <CardLayout
                                                        key={index}
                                                        relatedData={
                                                            relatedData
                                                        }
                                                        relationConfig={
                                                            relationConfig
                                                        }
                                                        handleStatusChangeClick={
                                                            handleStatusChangeClick
                                                        }
                                                        relationKey={
                                                            relationKey
                                                        }
                                                    />
                                                )
                                            )
                                        )}
                                    </div>
                                </div>
                            );
                        }
                    )}
            </div>

            <StatusModal
                isOpen={isModalOpen}
                onClose={() => setIsModalOpen(false)}
                status={status}
                setStatus={setStatus}
                comment={comment}
                setComment={setComment}
                submitStatusChange={submitStatusChange}
            />
        </div>
    );
};

export default RelatedCards;
