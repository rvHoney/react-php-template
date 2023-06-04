import UserAdd from "../components/UserAdd";
import UserSearch from "../components/UserSearch";
import UserList from "../components/UserList";

export default function Users() {
  return (
    <div>
      <h1>Users</h1>
      <UserAdd />
      <UserSearch />
      <UserList />
    </div>
  );
}