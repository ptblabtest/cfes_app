import React, { useState } from 'react';
import { Inertia } from '@inertiajs/inertia';

const RoleComponent = ({ item, options }) => {
  const [selectedRole, setSelectedRole] = useState(item.roles ? item.roles[0]?.name || "" : "");

  const handleRoleChange = (e) => {
    setSelectedRole(e.target.value);
  };

  const submitRoleChange = () => {
    Inertia.post("/permissions/change-role", {
      userId: item.id,
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
        {options.map((role) => (
          <option key={role} value={role}>
            {role}
          </option>
        ))}
      </select>
      <button
        className="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:ring-opacity-50"
        onClick={submitRoleChange}
      >
        Update
      </button>
    </div>
  );
};

export default RoleComponent;
