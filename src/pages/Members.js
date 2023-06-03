import MemberAdd from "../components/MemberAdd";
import MemberSearch from "../components/MemberSearch";
import MemberList from "../components/MemberList";

export default function Members() {
  return (
    <div>
      <h1>Members</h1>
      <MemberAdd />
      <MemberSearch />
      <MemberList />
    </div>
  );
}