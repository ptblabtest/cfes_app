export const SubmitButton = ({ onClick, isEdit }) => (
    <button
        type="submit"
        className="mt-3 ring-1 blue-500/50 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-3 rounded focus:outline-none focus:shadow-outline"
        onClick={onClick}
    >
        {isEdit ? "Update" : "Submit"}
    </button>
);