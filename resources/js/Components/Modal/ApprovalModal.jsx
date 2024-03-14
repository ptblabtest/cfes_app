import React, { useState } from 'react';

const ApproveModal = ({ item, isOpen, onClose, onSubmitApproval }) => {
  const [status, setStatus] = useState(item.status);
  const [comment, setComment] = useState(item.comment);

  const handleSubmit = () => {
    onSubmitApproval({ ...item, approve_status: status, approval_comment: comment });
    onClose(); // Close the modal after submission
  };

  if (!isOpen) {
    return null;
  }

  return (
    <div className="approval-modal-background">
      <div className="approval-modal-content">
        <label>Status:</label>
        <select value={status} onChange={(e) => setStatus(e.target.value)}>
          <option value="pending">Pending</option>
          <option value="approved">Approved</option>
          <option value="rejected">Rejected</option>
        </select>
        <label>Comment:</label>
        <textarea value={comment} onChange={(e) => setComment(e.target.value)} />
        <button onClick={onClose}>Cancel</button>
        <button onClick={handleSubmit}>Submit</button>
      </div>
    </div>
  );
};

export default ApproveModal;

