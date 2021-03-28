import React from 'react';
import { Header, Icon } from 'semantic-ui-react';

interface Props {
  label: string;
  icon: string;
}

const SectionHeader = ({ label, icon }: Props) => {
  return (
    <Header dividing as='h4'>
      <Icon className={icon} />
      {label}
    </Header>
  );
};

export default SectionHeader;
