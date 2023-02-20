# Installation
  1. Install cosmos with Ansible using this project: [https://github.com/hyphacoop/cosmos-ansible](https://github.com/hyphacoop/cosmos-ansible)
  2. Download this project with git: `git clone https://github.com/lyoleck/cosmosmetrics.git`
  3. Go to the project directory: `cd cosmosmetrics`
  3. Edit inventory/inventory file with your ansible_user and server address
  4. Install custom prometheus exporter with this command: `ansible-playbook cosmosmetrics/metrics-exporter.yml --limit cosmos-test-node -i inventory/inventory`
  5. [Optional] Install prometheus demo lab with this command: `ansible-playbook cosmosmetrics/prometheus-lab.yml --limit cosmos-test-node -i inventory/inventory`
