import ApproveModal from "@/Components/Modal/ApprovalModal";
import React, { useEffect, useState } from "react";

const ApproveInput = ({ name, value, onChange, fieldConfig }) => {
    const [isModalOpen, setModalOpen] = useState(false);

    const handleOpenModal = () => setModalOpen(true);
    const handleCloseModal = () => setModalOpen(false);

    const handleApprovalChange = (updatedValue) => {
        onChange(name, updatedValue);
        handleCloseModal();
    };

    useEffect(() => {
        const fetchApprovalLogs = async () => {
            try {
                const response = await axios.get(
                    `http://localhost:8000/api/approvallogs`
                );
                setApprovalLogs(response.data);
            } catch (error) {
                console.error("Failed to fetch approval logs:", error);
            }
        };
        fetchApprovalLogs();
    }, []);

    return (
        <>
            <button onClick={handleOpenModal} className="button-class">
                {fieldConfig.buttonLabel || "Review / Approve"}
            </button>
            <ApproveModal
                item={{ status: "pending", comment: "" }}
                isOpen={isModalOpen}
                onClose={handleCloseModal}
                onSubmitApproval={handleApprovalChange}
            />
        </>
    );
};

export default ApproveInput;
